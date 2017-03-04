<?php

require_once ('modules/HAT_Assets/updateAssets.php');


	global $db;
	$update_asset_bean=new UpdateAsset();
	$sugarbean = new HAT_Asset_Trans_Batch();
	$sugarbean->retrieve($_POST['record']);
     //add by yuan.chen  2016-12-07
     //需要事先判断 当前头状态是否从非已批准变为已批准 如果是的话 做后续erp资产调拨操作
	 
    $current_header_id = $_POST['record'];
	$need_allocation="N";
	$assets_line_array = $_POST['line_asset_infos'];
	/*echo "assets_line_array".$assets_line_array."====".$_POST['asset_trans_status']."111";
	exit();*/
	$result="";
	$hat_event_id = $_POST['event_type_id'];
	$event_bean = BeanFactory::getBean("HAT_EventType",$hat_event_id);
	$is_allocation_flag = $event_bean->allocation_flag;
	//事件类型勾上了才做资产调拨
	if($is_allocation_flag=='1'){


		//如果是新增 但是状态直接是提交 那么也当成需要完成资产调拨 满足条件1
		if(empty($current_header_id)&&($_POST['asset_trans_status']=="SUBMITTED")){
			$need_allocation="Y";
		}else{
			//如果有值 则通过数据库来判断
			$check_sql='select hat_asset_trans_batch.asset_trans_status from hat_asset_trans_batch where hat_asset_trans_batch.deleted=0 and hat_asset_trans_batch.id="'.$current_header_id.'"';
			$check_result = $db->query($check_sql);
			while ($check_record = $db->fetchByAssoc($check_result)) {
				$db_status = $check_record['asset_trans_status'];
				if($db_status!="CLOSED"&&$_POST['asset_trans_status']=="CLOSED"){
					$need_allocation="Y";
				}
			}
		}
		$need_allocation="Y";
		if($need_allocation=="Y"){
			$need_call_allocation_flag = "Y";
				for($i=0;$i<$_POST['line_cnt'];$i++){
					$line_target_cost_center = $assets_line_array["line_target_cost_center".$i];
					$line_target_cost_center_id = $assets_line_array["line_target_cost_center_id".$i];
					$line_target_location = $assets_line_array["line_target_location".$i];
					$line_target_location_id = $assets_line_array["line_target_location_id".$i];
					$line_target_asset_attribute10 = $assets_line_array["line_target_asset_attribute10".$i];
					$line_target_location_desc = $assets_line_array["line_target_location_desc".$i];
					$asset_id = $assets_line_array["line_asset_id".$i];
						$bean_location = BeanFactory :: getBean('HAT_Asset_Locations', $line_target_location_id);
						$mait_sites_bean = BeanFactory :: getBean('HAM_Maint_Sites', $bean_location->ham_maint_sites_id);
						$result_array = erp_asset_allocation($current_header_id,
															  $asset_id,
															  $line_target_cost_center_id,
															  $line_target_cost_center,
															  $mait_sites_bean->name,
															  $line_target_location_id,
															  $line_target_asset_attribute10,
															  $need_allocation);
						if($result_array[0]!='S'){
							$result->status = $result_array[0];
							$result->msg = $result_array[1];
							$need_call_allocation_flag="N";
							$result->msg .= "11111111111".$need_call_allocation_flag;
							echo json_encode($result);
							break;
						}else{
							$result->status = $result_array[0];
							$result->msg = $result_array[1];
							$need_call_allocation_flag="Y";
							$result->msg .= "222222222222222".$need_call_allocation_flag;
						}
				}
			if($need_call_allocation_flag=="Y"){
					//调用资产调拨
				    
					$result_array =  $update_asset_bean->update_fix_asset($_POST);
					$result->status = $result_array[0];
					$result->msg = $_POST;
					$result->msg .= "++++++++++++++++++++++";
					echo json_encode($result);
				}

		}else{
			
			$result->status = 'S';
			$result->msg = '';
			$result->msg = "--------------------".$need_call_allocation_flag;
			echo json_encode($result);
		}	
	}else{
		
		$result->status = 'S';
		$result->msg = '';
		$result->msg = "=================".$need_call_allocation_flag;
		echo json_encode($result);
		
	}

	
	
	
function erp_asset_allocation($current_header_id,
							  $asset_id,
							  $target_cost_center_id,
							  $target_cost_center,
							  $target_location,
							  $target_location_id,
							  $target_product,
							  $need_allocation){
	
	global $db;
	$really_allocation_flag="N";
	
	$asset_bean = BeanFactory::getBean("HAT_Assets",$asset_id);
	$result_array =array('S','');
	
	if($need_allocation=="Y"){//代表资产事物处理单的状态确实发生变化 只需判断下一步的条件是否满足
		//是否对应ERP那边的资产编号
		
		if($asset_bean->fixed_asset_id){
			
		  //判断是否发生变化 参数和DB里面的值进行判断
			  if(!empty($current_header_id)){
				  $check_line_sql =  'SELECT 
											  hat_asset_trans.target_cost_center_id,
											  hat_asset_trans.target_location_id,
											  ham_maint_sites.name target_location_desc,
											  hat_asset_trans.target_asset_attribute10 
											FROM
											  hat_asset_trans,
											  hat_asset_locations,
											  ham_maint_sites
											WHERE hat_asset_trans.deleted = 0 
											  AND hat_asset_trans.target_location_id = hat_asset_locations.id 
											  AND ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
											  AND ham_maint_sites.deleted = 0
											  AND hat_asset_locations.deleted = 0 and hat_asset_trans.batch_id="'.$current_header_id.'"';
					$check_result = $db->query($check_line_sql);
					while ($check_record = $db->fetchByAssoc($check_result)) {
						$db_target_cost_center_id=$check_record['target_cost_center_id'];
						$db_target_location_id  =$check_record['target_location_id'];
						$db_target_location_desc  =$check_record['target_location_desc'];
						$db_target_product=$check_record['target_asset_attribute10'];
						
						/*$asset_bean->load_relationship('hat_asset_locations_hat_assets');
						$locationsIds = $asset_bean->hat_asset_locations_hat_assets->get();
						$db_target_location_id  =$locationsIds[0];
						echo 'db_target_location_id = '.$db_target_location_id."\r\n";
						*/
						
						if($db_target_cost_center_id!=$target_cost_center_id||
						   $db_target_location_id!=$target_location_id||$db_target_location_desc!=$target_location||
						   ($db_target_product!=$target_product||$db_target_product!=$asset_bean->attribute10)){
							$really_allocation_flag='Y';
							
							//$result_array =  $update_asset_bean->update_fix_asset($asset_id,$target_cost_center,$target_location,$target_product);
							//echo var_dump($result_array);
						}
					}
					
					if($really_allocation_flag=="N"){
						//和资产进行比较
						$db_target_cost_center_id=$asset_bean->cost_center_id;
						$db_target_location_id  =$check_record['target_location_id'];
						$db_target_product=$asset_bean->attribute10;
						
						$asset_bean->load_relationship('hat_asset_locations_hat_assets');
						$locationsIds = $asset_bean->hat_asset_locations_hat_assets->get();
						$db_target_location_id  =$locationsIds[0];
						if($db_target_cost_center_id!=$target_cost_center_id||
						   $db_target_location_id!=$target_location_id||$db_target_location_desc!=$target_location||
						   ($db_target_product!=$target_product||$db_target_product!=$asset_bean->attribute10)){
							$really_allocation_flag='Y';
							//$result_array =  $update_asset_bean->update_fix_asset($asset_id,$target_cost_center,$target_location,$target_product);
							//echo var_dump($result_array);
						}	
					}	
			  }else{
					//刚新建 就审批 这个时候也要做调拨
					$db_target_cost_center_id=$asset_bean->cost_center_id;
					$db_target_location_id  =$check_record['target_location_id'];
					$db_target_product=$asset_bean->attribute10;
					
					$asset_bean->load_relationship('hat_asset_locations_hat_assets');
					$locationsIds = $asset_bean->hat_asset_locations_hat_assets->get();
					$db_target_location_id  =$locationsIds[0];
					if($db_target_cost_center_id!=$target_cost_center_id||
					   $db_target_location_id!=$target_location_id||$db_target_location_desc!=$target_location||
					   ($db_target_product!=$target_product||$db_target_product!=$asset_bean->attribute10)){
						$really_allocation_flag='Y';
						//$result_array =  $update_asset_bean->update_fix_asset($asset_id,$target_cost_center,$target_location,$target_product);
						//echo var_dump($result_array);
					}	
			  }
		}else{
			
			$really_allocation_flag='N';
			/*$result_array[0]='E';
			$result_array[1]=$asset_bean->name.'资产没有固定资产编号';*/
			$result_array[0]='S';
			$result_array[1]='';
			
		}
	}
	$result_array[3]=$really_allocation_flag;
	return $result_array;
}
?>