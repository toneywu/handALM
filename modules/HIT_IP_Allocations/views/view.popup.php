<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HIT_IP_AllocationsViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;
		insert_popup_header(null, false);
		echo '<script src="modules/HIT_IP_Allocations/js/popup_view.js"></script>';
		//echo "<input type='hidden' id='target_owning_org_id_advanced' value='".$_REQUEST["target_owning_org_id_advanced"]."'>";
		parent::Display();
		//echo var_dump($popupMeta);
		//echo $_REQUEST['target_owning_org_id_advanced'];
    }
    
	function process() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;
		//$popupMeta["whereStatement"].='access_assets_id="'.$_REQUEST["access_assets_id_advanced"].'"';
		//if(isset($_REQUEST["access_assets_name_advanced"])&&!empty($_REQUEST["access_assets_name_advanced"])){
		//	$popupMeta["whereStatement"].='(access_assets_name="'.$_REQUEST["hat_asset_name_advanced"].'" or hat_asset_name="'.$_REQUEST["hat_asset_name_advanced"].'")';
		//}
		//$popupMeta["whereStatement"].=' 2=1';
		parent::process();
		
		
		//echo  $_REQUEST["access_assets_name_advanced"];
		
		//echo var_dump(file_exists('modules/' . $this->module . '/Popup_picker.php'));
		echo print_r($popupMeta["whereStatement"]);
    }
}
