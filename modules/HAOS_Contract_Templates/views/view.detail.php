<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_Contract_TemplatesViewDetail extends ViewDetail
{

    function Display() {

        global $db;
        global $current_user;

        //0.处理头与行的语言包
        $modules = array('HAOS_Contract_Templates'
            );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };

		
        
        if(isset($_REQUEST["woop_id"])){
           echo '<script>var hideButtonFlag="Y";</script>';
       }
       parent::Display();

       
        //设置权限
        /*if(!(ACLController::checkAccess('HAA_Integration_Interface_Lines', 'detail', true))){
            echo '<script>$("#create_to_revenue_button").remove();</script>';
        }*/
    }
}