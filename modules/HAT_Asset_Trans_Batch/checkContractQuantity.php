<?php 

error_reporting(E_ALL);
global $db;
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
}

    $current_header_id = $_POST['record'];
	$display_status=$_POST['asset_trans_status'];
	$source_wo_id =$_POST['SOURCE_WO_ID'];
	$source_woop_id =$_POST['SOURCE_WOOP_ID'];
     //需要事先判断 当前头状态是否从非已批准变为已批准 如果是的话 做后续erp资产调拨操作
	$need_allocation="N";
	//如果是新增 但是状态直接是提交 那么也当成需要完成资产调拨 满足条件1
	if(empty($current_header_id)&&($display_status=="SUBMITTED")){
		$need_allocation="Y";
	}else{
		//如果有值 则通过数据库来判断
		$check_sql =  'select hat_asset_trans_batch.asset_trans_status from hat_asset_trans_batch where hat_asset_trans_batch.deleted=0 and hat_asset_trans_batch.id="'.$current_header_id.'"';
		$check_result = $db->query($check_sql);
		while ($check_record = $db->fetchByAssoc($check_result)) {
			$db_status = $check_record['asset_trans_status'];
			if($db_status!="APPROVED"&&$_POST['asset_trans_status']=="APPROVED"){
				$need_allocation="Y";
			}
		}
    }
	
	if($need_allocation=="Y"){
		$wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array (
										    'id' => $source_wo_id));	

		if(empty($wo_bean->contract_id)){
			//工作对象行有值
			$ham_woop_lines = BeanFactory :: getBean("HAM_WO_Lines")->get_full_list('', "ham_wo_lines.ham_wo_id ='" . $wo_bean->id . "'");
			if(count($ham_woop_lines)>0){
				foreach($ham_woop_lines as $ham_woop_line){
					$product_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
										    'id' => $ham_woop_line->product_id));	
					if(!empty($product_bean)){
						if($product_bean->asset_criticality_c=="A"){
							
							
							
						}else{
							
						}
						
						
					}else{
						
					}
					
					
					
				}
				
				
			}
			
			
			
		}
		
		
	}
	

?>