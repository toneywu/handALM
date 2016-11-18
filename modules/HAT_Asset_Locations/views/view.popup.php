<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_Asset_LocationsViewPopup extends ViewPopup
{

    function Display() {

	   echo '<script src="modules/HAT_Asset_Locations/js/popup_view.js"></script>';
	   if(!empty($_REQUEST["site_type"])){
		   echo '<script> var site_type="'.$_REQUEST["site_type"].'";</script>';
	   }
	   //
       parent::Display();

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
		//$_SESSION['Accounts2_QUERY'].=" AND 1=2";
		parent::process();
		//echo $popupMeta["whereStatement"];
		//echo "where".$popupMeta->_get_where_clause();
		//echo "REQUEST".var_dump($_SESSION);
		
		
		//echo  $_REQUEST["access_assets_name_advanced"];
		
		//echo var_dump(file_exists('modules/' . $this->module . '/Popup_picker.php'));
		//echo print_r($_SESSION);
		echo print_r($_SESSION['HAT_Asset_Locations2_QUERY']);
		//echo print_r($_REQUEST);
    }

}