<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $mod_strings;

if (isset ($_REQUEST["date_center_name"])) {
		$name_disp = $_REQUEST["date_center_name"];
		
		$data_ceneter_bean = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
										    'code_type' => "asset_location_type",
											'name'=>"数据中心"));
	if(!empty($data_ceneter_bean)){
		$data_ceneter_bean = BeanFactory :: getBean("HAT_Asset_Locations")->get_full_list('', "hat_asset_locations.name ='" . $name_disp . "' and hat_asset_locations.code_asset_location_type_id='".$data_ceneter_bean->id."'");
		
		
		if (count($data_ceneter_bean)==0) {
			echo "N";
		} else {
			echo "Y";
		}
		
		}
}	
?>