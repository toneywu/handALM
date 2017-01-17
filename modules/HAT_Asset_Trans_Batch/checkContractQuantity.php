<?php 
	global $db;
	$current_header_id = $_POST['record'];
	$display_status=$_POST['asset_trans_status'];
	$source_wo_id =$_POST['source_wo_id'];
	$source_woop_id =$_POST['source_woop_id'];
     //需要事先判断 当前头状态是否从非已批准变为已批准 如果是的话 做后续erp资产调拨操作
	$need_allocation="N";
	//echo $_POST['asset_trans_status'];
	//如果是新增 但是状态直接是提交 那么也当成需要完成资产调拨 满足条件1
	if(empty($current_header_id)&&($display_status=="CLOSED")){
		$need_allocation="Y";
	}else{
		//如果有值 则通过数据库来判断
		$check_sql =  'select hat_asset_trans_batch.asset_trans_status from hat_asset_trans_batch where hat_asset_trans_batch.deleted=0 and hat_asset_trans_batch.id="'.$current_header_id.'"';
	    $check_result = $db->query($check_sql);
		while ($check_record = $db->fetchByAssoc($check_result)) {
			$db_status = $check_record['asset_trans_status'];
			if($db_status!="CLOSED"&&($_POST['asset_trans_status']=="SUBMITTED"||$_POST['asset_trans_status']=="SUBMITTED")){
				$need_allocation="Y";
			}
		}
    }
	$assets_line_array = $_POST['line_asset_id'];
	//当前事物处理单的数量
	$current_display_quantity = 0;
	foreach($assets_line_array as $key =>$value){
		$assets_bean =  BeanFactory :: getBean('HAT_Assets',$value);
		
		if (!empty($assets_bean)){
			$racks_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.hat_assets_id ='" . $assets_bean->id . "'");
			$racks_bean=$racks_beans[0];
			
			if($racks_bean->enable_partial_allocation!="1"&&$assets_bean->enable_it_rack=="1"){
				$current_display_quantity=$current_display_quantity+1;
			}
		}
		
	}
	$wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array (
										    'id' => $source_wo_id));	
	$history_qty=0;
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
	}
	//echo "history_sql=".$history_sql;
	$display_quantity=$current_display_quantity+$history_qty;
	//echo "current_display_quantity = ".$current_display_quantity."-history_qty=".$history_qty;
	if($need_allocation=="Y"){
			
			
		$contract_qty =0;
		//echo "test";
		
		$ham_woop_lines = BeanFactory :: getBean("HAM_WO_Lines")->get_full_list('', "ham_wo_lines.ham_wo_id ='" . $source_wo_id . "'");
		
		$product_quantity=0;
		if(!empty($wo_bean->contract_id)){
			//工作对象行有值
			if(count($ham_woop_lines)>0){
				//合同数量
				$contract_line_beans = BeanFactory :: getBean("AOS_Products_Quotes")->get_full_list('', "aos_products_quotes.parent_id ='" . $wo_bean->contract_id . "'");
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
				
				//echo $contract_qty;
				if($display_quantity>$contract_qty){
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