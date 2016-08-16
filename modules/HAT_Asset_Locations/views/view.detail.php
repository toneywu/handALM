<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_Asset_LocationsViewDetail extends ViewDetail
{

    function display(){

        $modules = array(
            'HAT_Asset_Locations',
            'HAT_Assets',
        );
        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };


        echo '<input type="hidden" id="current_icon" value="'.$this->bean->location_icon.'"/>';

        if(isset($this->bean->code_asset_location_type_id) && ($this->bean->code_asset_location_type_id)!=""){
            $location_type_id = $this->bean->code_asset_location_type_id;
            $bean_code = BeanFactory::getBean('HAA_Codes',$location_type_id);
            $ff_id = $bean_code->haa_ff_id;

            if (isset($ff_id) && $ff_id!="") {
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }
        }
        parent::display();
    }

}
