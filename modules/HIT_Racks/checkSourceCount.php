<?php 
	global $db;
	$current_asset_id = $_POST['record'];
	$asset_source_id  = $_POST['asset_source_id'];
	$return_flag = "S";
	
	if(!empty($asset_source_id)){
		$source_bean = $data_ceneter_bean = BeanFactory :: getBean('HAT_Asset_Sources')->retrieve_by_string_fields(array (
										    'id' => $asset_source_id));
											
		$asset_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.asset_source_id ='" . $asset_source_id . "'");

		if(!empty($current_asset_id)){
			//A的数量 								
			if(count($asset_beans)>$source_bean->line_qty){
				$return_flag="新增的设备数量已经超过来源相关单据内的数量，请检查后再录入。";
			}									
		}else{
			//前台的数量1+后台的数量
			if((count($asset_beans)+1)>$source_bean->line_qty){
				$return_flag="新增的设备数量已经超过来源相关单据内的数量，请检查后再录入。";
			}	
		}
	}
	
echo $return_flag；
?>