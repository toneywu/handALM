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
    }
    
   
    
    public function listViewProcess(){

        echo "helloworld";
        //$this->params['custom_select'] = " CUSTOM SELEC";
        //$this->params['custom_from'] = "CUSTOM FROM";
        $this->where .= " where target_owning_org_id_advanced="."54b17458-3c99-15cd-ce95-57ad8b859112";
        parent::listViewProcess();
        
    }
}
