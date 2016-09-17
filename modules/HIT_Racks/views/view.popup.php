<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HIT_RacksViewPopup extends ViewPopup
{


    function Display() {

 		global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;

        //require_once('include/Popups/PopupSmarty.php');
        insert_popup_header(null, false);

        require_once('modules/HAT_Asset_Locations/selector.php');
       //parent::Display();
    }
}
