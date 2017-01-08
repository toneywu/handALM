<?php 
	global $db;
	$current_asset_id = $_POST['record'];
	$asset_source_id  = $_POST['asset_source_id'];
	$enable_it_ports  = $_POST['enable_it_ports'];
	$return_flag = "S";
	
	if($enable_it_ports=="1"&&!empty($asset_source_id)){
		$source_bean = $data_ceneter_bean = BeanFactory :: getBean('HAT_Asset_Sources')->retrieve_by_string_fields(array (
										    'id' => $asset_source_id));
											
		

		if(!empty($current_asset_id)){
			//A的数量 	
			$asset_beans = BeanFactory :: getBean("HAT_Assets")->get_full_list('', "hat_assets.asset_source_id ='" . $asset_source_id . "' and hat_assets.enable_it_ports='1' and hat_assets.id!='".$current_asset_id."'");			
			if(count($asset_beans)+1>$source_bean->line_qty){
				$return_flag="新增的设备数量已经超过来源相关单据内的数量，请检查后再录入。";
			}									
		}else{
			//前台的数量1+后台的数量
			$asset_beans = BeanFactory :: getBean("HAT_Assets")->get_full_list('', "hat_assets.asset_source_id ='" . $asset_source_id . "' and hat_assets.enable_it_ports='1'");
			if((count($asset_beans)+1)>$source_bean->line_qty){
				$return_flag="新增的设备数量已经超过来源相关单据内的数量，请检查后再录入。";
			}	
		}
	}
echo $return_flag
?>