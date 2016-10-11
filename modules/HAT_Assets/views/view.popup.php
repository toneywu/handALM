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
	       parent::Display();
	    }
    }
}
