<?php
function validate_function(){
	global $db,$app_list_strings;
	$result = array(
		"return_status"=>0,
		"msg_data"=>"",
		);
	$import_set_bean = BeanFactory::getBean('HAA_Import_Sets',$_REQUEST["id"]);
	$import_datas = BeanFactory :: getBean("HAA_Import_Datas")->get_full_list('', "haa_import_datas.document_id_c ='" . $import_set_bean->document_id_c . "' and haa_import_datas.line_number > 0 and haa_import_datas.import_status!='SUCCESS'");
	if (isset($import_datas)) {
		foreach ($import_datas as $data_line) {
			$data_line->import_status='VALID';
			$data_line->error_message='';
			//以下是位置数据的验证
			//验证维护区域
			$cv1 = $data_line->column_value1;
			if(!empty($cv1)){
				$sqlcv1 = 'select id from ham_maint_sites where name = "'.$cv1.'" limit 1';
				$sqlcv1_result=$db->query($sqlcv1);
				$ccv1='';
				if($row1 = $db->fetchByAssoc($sqlcv1_result)){
					$ccv1 = $row1['id'];
				}
				if(empty($ccv1)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到对应的维护区域;';
				}else{
					$data_line->convert_column_value1 = $ccv1;
				}
			}
			//验证位置类型
			$cv2 = $data_line->column_value2;
			if(!empty($cv2)){
				$sqlcv2 = 'select id from haa_codes where code_type="asset_location_type" and name = "'.$cv2.'" limit 1';
				$sqlcv2_result=$db->query($sqlcv2);
				$ccv2='';
				if($row2 = $db->fetchByAssoc($sqlcv2_result)){
					$ccv2 = $row2['id'];
				}
				if(empty($ccv2)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到对应的位置类型;';
				}else{
					$data_line->convert_column_value2 = $ccv2;
				}
			}
			//验证父位置
			$cv3 = $data_line->column_value3;
			if(!empty($cv3)){
				$sqlcv3 = 'select id from hat_asset_locations where name = "'.$cv3.'" limit 1';
				$sqlcv3_result=$db->query($sqlcv3);
				$ccv3='';
				if($row3 = $db->fetchByAssoc($sqlcv3_result)){
					$ccv3 = $row3['id'];
				}
				if(empty($ccv3)){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'找不到对应的父位置;';
				}else{
					$data_line->convert_column_value3 = $ccv3;
				}
			}
			//验证位置的name
			if(!empty($data_line->column_value4)){
				$sqlcv4 = 'select id,count(id) location_count from hat_asset_locations where name = "'.$data_line->column_value4.'"';
				$sqlcv4_result=$db->query($sqlcv4);
				if($row4 = $db->fetchByAssoc($sqlcv4_result)){
					$ccv4_count = $row4['location_count'];
					$ccv4 = $row4['id'];
				}
				if($ccv4_count>1){
					$result['return_status'] = 1;
					$data_line->import_status = 'ERROR';
					$data_line->error_message = $data_line->error_message.'该位置名称存在多个;';
				}elseif ($ccv4_count==1) {
					$data_line->convert_column_value4=$ccv4;
				}
			}

			$data_line->save();
		}
	}
	if($result['return_status']==1){
		$result['msg_data']='存在数据验证不合法';
	}
	echo json_encode($result);
}


function import_function(){
	global $db;
	$result = array(
		"return_status"=>0,
		"msg_data"=>"",
		);
	$import_set_bean = BeanFactory::getBean('HAA_Import_Sets',$_REQUEST["id"]);
	$import_datas = BeanFactory::getBean("HAA_Import_Datas")->get_full_list('', "haa_import_datas.document_id_c ='" . $import_set_bean->document_id_c . "' and haa_import_datas.line_number > 0 and haa_import_datas.import_status='VALID'");
	if (isset($import_datas)) {
		foreach ($import_datas as $data_line) {
			$data_line->import_status='SUCCESS';
			$data_line->error_message='';
			$data_line->save();
			$flag = getSaveFlag($data_line);
			if(substr($flag,0,1)=='1'){
				if(!empty($data_line->column_value4)){
					if(!empty($data_line->convert_column_value4)){
						$location_bean = BeanFactory::getBean('HAT_Asset_Locations',$data_line->convert_column_value4);
					}else{
						$location_bean = BeanFactory::newBean('HAT_Asset_Locations');
					}
				}else{
					$location_bean = BeanFactory::newBean('HAT_Asset_Locations');
				}
				$location_bean->ham_maint_sites_id = $data_line->convert_column_value1;
				$location_bean->code_asset_location_type_id = $data_line->convert_column_value2;
				$location_bean->parent_location_id = $data_line->convert_column_value3;
				$location_bean->name = $data_line->column_value4;
				$location_bean->attribute2 = $data_line->column_value5;
				$location_bean->description = $data_line->column_value6;
				$location_bean->save();
				$result['location_bean_id'].=$location_bean->id.';';
				
			}
			
		}
	}
	else{
		$result['return_status']=1;
		$result['msg_data']='不存在有效的导入数据';
	}
	echo json_encode($result);
}


function getSaveFlag($data_line){
	$flag = '';
	if(empty($data_line->column_value1)&&empty($data_line->column_value2)&&empty($data_line->column_value3)&&empty($data_line->column_value4)&&empty($data_line->column_value5)&&empty($data_line->column_value6)){
		$flag.='0';
	}else{
		$flag.='1';
	}

	return $flag;
}

?>