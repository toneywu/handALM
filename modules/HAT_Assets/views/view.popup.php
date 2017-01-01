<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_AssetsViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;

        if (isset($_REQUEST['current_mode'])&&$_REQUEST['current_mode']!="") {
        	//如果current_mode在参数传入时有设置，则显示树型选择器
        	//require_once('include/Popups/PopupSmarty.php');
        	insert_popup_header(null, false);
        	require_once('modules/HAT_Asset_Locations/selector.php');
        }
         else {
        	//如果当前没有current_mode就按常规的列表显示
        	echo '<script src="modules/HAT_Assets/js/popup_view.js"></script>';
            if (isset($_REQUEST['target_owning_org_id_advanced'])&&$_REQUEST['target_owning_org_id_advanced']!="") {
				 echo '<script> var owning_org_id="'.$_REQUEST["target_owning_org_id_advanced"].'";</script>';
            }
			if (isset($_REQUEST['asset_type'])&&$_REQUEST['asset_type']!="") {
				echo '<script> var asset_type="'.$_REQUEST["asset_type"].'";</script>';
			}
			if (isset($_SESSION["current_framework"])&&$_SESSION["current_framework"]!="") {
				 echo '<script> var current_framework="'.$_SESSION["current_framework"].'";</script>';
            }



            parent::Display();
	    }
    }


	function process() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;


		parent::process();

    }
}
