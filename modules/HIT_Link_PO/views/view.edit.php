<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');
class HIT_Link_POViewEdit extends ViewEdit {
	function Display() {
		global $db;
		global $current_user;
		$asset_bean = BeanFactory::getBean('HAT_Assets', $this->bean->product_id);
		 
         $this->bean->asset_group = $asset_bean->asset_group;
         $this->bean->line_number = $asset_bean->tracking_number;
         $this->bean->asset_location = $asset_bean->hat_asset_locations_hat_assets_name;
         $source_bean = BeanFactory::getBean('HAT_Asset_Sources', $this->bean->asset_source_id);
         $this->bean->asset_source = $source_bean->name;
         $this->bean->vendor = $source_bean->supplier_desc;
		parent :: Display();
	}
}