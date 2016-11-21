<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $mod_strings, $app_strings, $sugar_config;

if(ACLController::checkAccess('HAT_Asset_Locations', 'edit', true))$module_menu[]=Array("index.php?module=HAT_Asset_Locations&action=EditView&return_module=HAT_Asset_Locations&return_action=index", $mod_strings['LBL_NEW_FORM_TITLE'],"Create", 'HAT_Asset_Locations');

if(ACLController::checkAccess('HAT_Asset_Locations', 'list', true)) {
		$module_menu[]=Array("index.php?module=HAT_Asset_Locations&action=index&return_module=HAT_Asset_Locations&return_action=DetailView", $mod_strings['LNK_LIST'],"List", 'HAT_Asset_Locations');

		$module_menu[] = Array(
        //URL
        "index.php?module=HAT_Asset_Locations&action=selector&return_module=HAT_Asset_Locations&return_action=index",
        //Label String
        $mod_strings['LBL_LINK_SELECTOR'],
        //Image icon. Icons are found in ./themes/default/images.
        'TreeView',
        //Module Name
        'HAT_Asset_Locations'
    );
}

if(ACLController::checkAccess('HAT_Asset_Locations', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=HAT_Asset_Locations&return_module=HAT_Asset_Locations&return_action=index", $mod_strings['LNK_IMPORT_HAT_ASSET_LOCATIONS'],"Import", 'HAT_Asset_Locations');


?>