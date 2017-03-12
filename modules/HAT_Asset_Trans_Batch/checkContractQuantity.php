<?php 
	global $db;
	$current_header_id = $_POST['record'];
	$display_status=$_POST['asset_trans_status'];
	$source_wo_id =$_POST['source_wo_id'];
	$source_woop_id =$_POST['source_woop_id'];
	$hat_eventtype_id =$_POST['hat_eventtype_id'];
    //如果事物处理单
	if ($hat_eventtype_id!="") {

		$status_sql="SELECT
						processing_asset_status
					FROM
						hat_eventtype
					WHERE
						1 = 1
					AND id ='".$hat_eventtype_id."'";
	
		$status_result = $db->query($status_sql);
		//echo($status_sql);
		while ($status_record = $db->fetchByAssoc($status_result)) {
			$processing_asset_status = $status_record['processing_asset_status'];
			if ($processing_asset_status == 'Idle') {
				echo "S";
				exit();
			}
		}


	}
	//需要事先判断 当前头状态是否从非已批准变为已批准 如果是的话 做后续erp资产调拨操作
	$need_allocation="N";
	//echo $_POST['asset_trans_status'];
	//如果是新增 但是状态直接是提交 那么也当成需要完成资产调拨 满足条件1
	if(empty($current_header_id)&&($display_status=="CLOSED"||$display_status=="SUBMITTED"||$display_status=="TRANSACTED")){
		$need_allocation="Y";
	}else{
		//如果有值 则通过数据库来判断
		$check_sql =  'select hat_asset_trans_batch.asset_trans_status from hat_asset_trans_batch where hat_asset_trans_batch.deleted=0 and hat_asset_trans_batch.id="'.$current_header_id.'"';
	    $check_result = $db->query($check_sql);
		while ($check_record = $db->fetchByAssoc($check_result)) {
			$db_status = $check_record['asset_trans_status'];
			if($db_status!="CLOSED"&&($_POST['asset_trans_status']=="CLOSED"||$_POST['asset_trans_status']=="SUBMITTED"||$_POST['asset_trans_status']=="TRANSACTED")){
				$need_allocation="Y";
			}
		}
    }
    //事物处理上的工单
    $wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array (
										    'id' => $source_wo_id));

    if ($need_allocation=="Y"&&!empty($wo_bean)) {
    	$assets_line_array = $_POST['line_asset_id'];
		//当前事物处理单的数量,因为行可能是新加的,只有通过产品来计量行的数量
    	$current_display_quantity = 0;
		//$i=0;
    	foreach($assets_line_array as $key =>$value){
    		$assets_bean =  BeanFactory :: getBean('HAT_Assets',$value);
			//$assets_line_id[$i]=$value;
    		if (!empty($assets_bean)){
    			$racks_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.hat_assets_id ='" . $assets_bean->id . "'");
    			$racks_bean=$racks_beans[0];

				//资产为机柜且为整柜
    			if($racks_bean->enable_partial_allocation!="1"&&$assets_bean->enable_it_rack=="1"){
    				$current_display_quantity=$current_display_quantity+1;
    			}
    		}

    	}
		//工作对像行
    	$wo_lines_beans = BeanFactory :: getBean("HAM_WO_Lines")->get_full_list('', "ham_wo_lines.ham_wo_id ='" . $source_wo_id . "'");

    	$product_quantity=0;
    	if(count($wo_lines_beans)>0){
    		foreach($wo_lines_beans as $wo_lines_bean){
    			$product_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
    				'id' => $wo_lines_bean->product_id));	
    			if(!empty($product_bean)){
    				if($product_bean->asset_criticality_c=="A"){
    					$product_quantity=$product_quantity+$wo_lines_bean->quantity;	
    				}
    			}	
    		}
    	}
		//如果事物行的数量>工作对像行且工作对象行不等于0
    	if ($product_quantity!=0&&$product_quantity<$current_display_quantity) {
    		echo '分配数量已经超过约定数量！  不能将资产事务处理单状态更改为“已批准”';
    		exit();
    	}

        //工单合同头有值且来源为欣润,且合同行的产品重要性为A,则验证数量,否则返回S
    	if(empty($wo_bean->contract_id)){
    		echo "S";
    		exit();
    	}
    	$contract_bean = BeanFactory :: getBean('AOS_Contracts')->retrieve_by_string_fields(array ('id' => $wo_bean->contract_id));
    	$code_bean = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
    		'id' => $contract_bean->haa_codes_id_c));
    	if ($code_bean->name != '欣润') {
    		echo "S";
    		exit();
    	}
    	$contract_qty = 0;
    	$contract_line_beans = BeanFactory :: getBean("AOS_Products_Quotes")->get_full_list('', "aos_products_quotes.parent_id ='".$contract_bean->id."'");
    	foreach($contract_line_beans as $contract_line_bean){
    		$product_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
    			'id' => $contract_line_bean->product_id));
    		if(!empty($product_bean)){
						//echo $product_bean->asset_criticality_c;
    			if($product_bean->asset_criticality_c=="A"){
							//echo "----产品数量".$contract_line_bean->product_qty."---------";
    				$contract_qty=$contract_qty+$contract_line_bean->product_qty;

    			}
    		}
    	}
    	if ($contract_qty == 0) {
    		echo "S";
    		exit();
    	}
    	$asset_qty = 0;
    	$asset_qty_sql="SELECT COUNT(*) asset_qty
				    	from hat_assets 
				    	WHERE hat_assets.deleted = 0
				    	AND attribute9 ='".$contract_bean->id."'";
    	$result=$db->query($asset_qty_sql);
    	while($row=$db->fetchByAssoc($result)){
    		if ($row['asset_qty'] != "") {
    			$asset_qty = $row['asset_qty'];
    		}
    	}
    	//current_display_quantity 的数量要重新计算,第一次计算的时候,没有排除合同已处理过的数量
    	$current_display_quantity = 0;
    	$assets_line_array = $_POST['line_asset_id'];
    	foreach($assets_line_array as $key =>$value){
    		$assets_bean =  BeanFactory :: getBean('HAT_Assets',$value);
					//$assets_line_id[$i]=$value;
    		if (!empty($assets_bean)){
    			$racks_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.hat_assets_id ='" . $assets_bean->id . "'");
    			$racks_bean=$racks_beans[0];

						//资产为机柜且为整柜,并且为该合同未处理过的
    			if($racks_bean->enable_partial_allocation!="1"&&$assets_bean->enable_it_rack=="1"&&$assets_bean->attribute9 != $contract_bean->id){
    				$current_display_quantity=$current_display_quantity+1;
    			}
    		}
    	}
    	if($current_display_quantity+$asset_qty>$contract_qty){
    		echo "asset_qty_sql:".$asset_qty_sql."<br/>";
    		echo "已用数量:".$asset_qty."<br/>";
    		echo "当前数量:".$current_display_quantity."<br/>";
    		echo "合同数量:".$contract_qty."<br/>";
				    //echo "assets_line_id:".$assets_line_id."<br/>";
    		echo '分配数量已经超过约定数量！  不能将资产事务处理单状态更改为“已批准”';
    		exit();
    	}
    	else{
            /*echo "asset_qty_sql:".$asset_qty_sql."<br/>";
            echo "已用数量:".$asset_qty."<br/>";
            echo "当前数量:".$current_display_quantity."<br/>";
            echo "合同数量:".$contract_qty."<br/>";*/
    		echo "S";
    		exit();
    	}
    }
    else{
    	echo "S";
    	exit();
    }
?>