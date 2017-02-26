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
	//echo "--------------------------------------";

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
	$assets_line_array = $_POST['line_asset_id'];
	//echo "assets_line_array".$assets_line_array;
	//当前事物处理单的数量,因为行可能是新加的,只有通过产品来计量行的数量
	$current_display_quantity = 0;
	//$i=0;
	foreach($assets_line_array as $key =>$value){
		$assets_bean =  BeanFactory :: getBean('HAT_Assets',$value);
		//$assets_line_id[$i]=$value;
		if (!empty($assets_bean)){
			$racks_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.hat_assets_id ='" . $assets_bean->id . "'");
			$racks_bean=$racks_beans[0];
			
			if($racks_bean->enable_partial_allocation!="1"&&$assets_bean->enable_it_rack=="1"){
				$current_display_quantity=$current_display_quantity+1;
			}
		}
		//$i =$i +1;
		
	}

	/*//当前事物处理单的数量,1)trans的asset为机柜 2)机柜为整柜 3)终止使用分配不勾选add by liu
	$current_display_quantity = 0;
	$trans_qty_sql="SELECT
						count(*) trans_qty
					FROM
						hat_asset_trans line
					INNER JOIN hat_asset_trans_batch batch ON (
						batch.id = line.batch_id
						AND batch.deleted = 0
					)
					INNER JOIN hit_racks hr ON (
						line.asset_id = hr.hat_assets_id
						AND hr.deleted = 0
					)
					INNER JOIN hat_assets ha ON (
						ha.id = hr.hat_assets_id
						AND ha.deleted = 0
					)
					WHERE
						hr.enable_partial_allocation != 1
					AND ha.enable_it_rack = 1
					AND line.deleted = 0
					AND line.inactive_using = 0
					AND batch.id ='".$current_header_id."'";
	$trans_qty_result=$db->query($trans_qty_sql);
	while($trans_qty_row=$db->fetchByAssoc($trans_qty_result)){
		if ($trans_qty_row['trans_qty'] != "") {
			$current_display_quantity = $trans_qty_row['trans_qty'];
		}else{
			$current_display_quantity = 0;
		}
	}*/

	//下面那段sql是不等于资产事物处理单的id,以前是获取其他事务处理单的行的数量
	$wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array (
										    'id' => $source_wo_id));
	
	/*$history_qty=0;
	//这个现在不需要了
	$history_sql =  'SELECT COUNT(1) cnt
					FROM   hat_asset_trans line
					INNER  JOIN hat_asset_trans_batch batch
					ON     (batch.id = line.batch_id AND batch.deleted = 0)
					INNER  JOIN ham_wo hw
					ON     (batch.source_wo_id = hw.id AND hw.deleted = 0)
					INNER  JOIN ham_woop hwoop
					ON     (batch.source_woop_id = hwoop.id AND hwoop.deleted = 0)
					INNER  JOIN hit_racks hr
					ON     (line.asset_id = hr.hat_assets_id AND hr.deleted = 0)
					INNER  JOIN hat_assets ha
					ON     (ha.id = hr.hat_assets_id AND ha.deleted = 0)
					WHERE  hr.enable_partial_allocation != "1"
					AND    ha.enable_it_rack = "1"
					AND    line.deleted=0 and hw.contract_id="'.$wo_bean->contract_id.'" and batch.id!="'.$current_header_id.'"';
	$history_result = $db->query($history_sql);
	while ($history_record = $db->fetchByAssoc($history_result)) {
		$history_qty = $history_record['cnt'];
	}*/
	//echo "history_sql=".$history_sql;
	//$display_quantity=$current_display_quantity+$history_qty;
	$display_quantity=$current_display_quantity;
	//echo "current_display_quantity = ".$current_display_quantity."-history_qty=".$history_qty;
	if($need_allocation=="Y"){
			
			
		$contract_qty =0;
		//echo "test";
		
		$ham_woop_lines = BeanFactory :: getBean("HAM_WO_Lines")->get_full_list('', "ham_wo_lines.ham_wo_id ='" . $source_wo_id . "'");
		
		$product_quantity=0;
		if(!empty($wo_bean->contract_id)){
			//工作对象行有值
			if(count($ham_woop_lines)>0){
			
				//合同数量  合同界面 合同行中标记重要性标记为“A”的产品的数量
				//以前的合同是工单头的合同,现在取的是工单的工作对像行中资产为机柜所在的行的合同,add by liu
				$line_contract_id =$wo_bean->contract_id;//行上的合同,一般情况下只有一个值
				$asset_qty =0;
                foreach($ham_woop_lines as $ham_woop_line){
                	$ham_line_product = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
										    'id' => $ham_woop_line->product_id));

                	if (!empty($ham_line_product)&&$ham_line_product->asset_criticality_c=="A") {
                		$line_contract_id = $ham_woop_line->contract_id;
                	}
                }
                $contract_line_beans = BeanFactory :: getBean("AOS_Products_Quotes")->get_full_list('', "aos_products_quotes.parent_id ='".$line_contract_id."'");
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

				$contract_bean = BeanFactory :: getBean('AOS_Contracts')->retrieve_by_string_fields(array ('id' => $line_contract_id));
				$asset_qty_sql="";
				if ($contract_bean->haa_codes_id_c == 'f1168478-cb96-7903-ab48-584ffdaf87d9') {
					$asset_qty = 0;
				}else{
					//已用数量:asset 的 A9 字段 统计数量,a9为合同id
                //global $db;
					$asset_qty_sql="SELECT COUNT(*) asset_qty
									from hat_assets 
									WHERE hat_assets.deleted = 0
									AND attribute9 ='".$line_contract_id."'";
					$result=$db->query($asset_qty_sql);
					while($row=$db->fetchByAssoc($result)){
						if ($row['asset_qty'] != "") {
							$asset_qty = $row['asset_qty'];
						}
					}

				}
				
				/*echo "asset_qty_sql:".$asset_qty_sql."<br/>";
					echo "asset_qty:".$asset_qty."<br/>";
				    echo "display_quantity:".$display_quantity."<br/>";
				    echo "contract_qty:".$contract_qty."<br/>";*/
				if($display_quantity+$asset_qty>$contract_qty){
					echo "asset_qty_sql:".$asset_qty_sql."<br/>";
					echo "已用数量:".$asset_qty."<br/>";
				    echo "当前数量:".$display_quantity."<br/>";
				    echo "合同数量:".$contract_qty."<br/>";
				    //echo "assets_line_id:".$assets_line_id."<br/>";
					echo '分配数量已经超过约定数量！  不能将资产事务处理单状态更改为“已批准”';
				}else{
					echo "S";
				}
			}	
		}else{
			//echo count($ham_woop_lines);
			if(count($ham_woop_lines)!=0){
				foreach($ham_woop_lines as $ham_woop_line){
					
						$product_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
												'id' => $ham_woop_line->product_id));	
						if(!empty($product_bean)){
							if($product_bean->asset_criticality_c=="A"){
								$product_quantity=$product_quantity+$ham_woop_line->quantity;	
							}
						}	
				}
				
				if($current_display_quantity>$product_quantity){
					echo '分配数量已经超过约定数量！  不能将资产事务处理单状态更改为“已批准”';
				}else{
					echo "S";
				}
				
			}else{
				echo "S";
			}
		}
	}else{
		echo "S";
	}
?>