<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAA_UOMViewPopup extends ViewPopup
{




    function process() {

        global $mod_strings, $app_strings, $app_list_strings;
        global $db;
        global $popupMeta;

        parent::process();
        //echo print_r($_SESSION['HAA_UOM2_QUERY']);
    }
}