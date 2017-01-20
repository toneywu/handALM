<?php 
	global $db;
	$current_rack_id = $_POST['record'];
	$rack_name  = $_POST['name'];
	$asset_number  = $_POST['asset_number'];
	
	$return_msg = "";
	$return_status="S";
	$result="";
	
	if(empty($current_rack_id)){
		$result->msg="ddd";
		$rack_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.name ='" . $rack_name . "'");
		if(count($rack_beans)>0){
			$return_msg="该机柜名称系统中已经存在.";
			$return_status='E';
		}
		$assets_beans = BeanFactory :: getBean("HAT_Assets")->get_full_list('', "hat_assets.asset_number ='" . $asset_number . "' and  hat_assets.asset_number is not null and hat_assets.enable_it_rack=1");
		
		if(count($assets_beans)>0){
			$return_msg="该机柜编号在系统中已经存在.";
			$return_status='E';
		}
	}else{
		$rack_beans = BeanFactory :: getBean("HIT_Racks")->get_full_list('', "hit_racks.name ='" . $rack_name . "' and hit_racks.id!='".$current_rack_id."'");
		if(count($rack_beans)>0){
			$return_msg="该机柜名称系统中已经存在.";
			$return_status='E';
		}
		$current_bean = BeanFactory::getBean('HIT_Racks',$current_rack_id);
		$assets_beans = BeanFactory :: getBean("HAT_Assets")->get_full_list('', "hat_assets.asset_number ='" . $asset_number . "' and hat_assets.asset_number is not null and hat_assets.enable_it_rack=1 and hat_assets.id!='".$current_bean->hat_assets_id."'");
		if(count($assets_beans)>0){
			$return_msg="该机柜编号在系统中已经存在.";
			$return_status='E';
		}
	}
	$result->status=$return_status;
	$result->status=$return_status;
	$result->msg=$return_msg;
	echo json_encode($result);
?>