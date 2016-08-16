<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_AssetsViewDetail extends ViewDetail
{

    function Display() {

    	if($this->bean->enable_it_rack==1) {
    		//如果当前为机架，则试图显示当前的机架呈
    		$bean_rack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('hat_assets_id'=>$this->bean->id));
    		$this->bean->hit_racks = $bean_rack->name;
    		$this->bean->hit_racks_id = $bean_rack->id;
    	} else {
    		$this->bean->hit_racks = '<input type="checkbox" class="checkbox" id="hit_racks_hat_assets_flag" disabled="true">';
    	}

    	if($this->bean->enable_linear==1) {
    		//如果启用了线性资产，则读取线性资产相关信息，如“Linear Reference Methord"
    		$bean_rack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('hat_assets_id'=>$this->bean->id));
    	}


		$bean_location = BeanFactory::getBean('HAT_Asset_Locations', $this->bean->hat_asset_locations_hat_assetshat_asset_locations_ida); 
		if ($bean_location) { // test if $bean_location was loaded successfully
				// this is only necessary if you'll need custom fields from ModuleB
				//$bean_location->custom_fields->retrieve();
				// now set some variables of current record on ModuleA to values retrieved from the related record on ModuleB
				$this->bean->map_lat = isset($bean_location->map_lat)?$bean_location->map_lat:''; 
				$this->bean->map_lng = isset($bean_location->map_lng)?$bean_location->map_lng:''; //$bean_location->map_lng;
				$this->bean->map_address = isset($bean_location->map_address)?$bean_location->map_address:'';//$bean_location->map_address;
				$this->bean->map_zoom = isset($bean_location->map_zoom)?$bean_location->map_zoom:'';//$bean_location->map_zoom;
		}
		$this->bean->map_zoom = isset($bean_location->map_zoom)?$bean_location->map_zoom:'';//$bean_location->map_zoom;

/*
		if (isset($this->bean->asset_status))
			$this->bean->asset_status = "<span class='color_tag color_asset_status_".$this->bean->asset_status."'>".$app_list_strings['asset_status_list'][$this->bean->asset_status]."</span>";
*/
        parent::Display();

	}

}//end class
