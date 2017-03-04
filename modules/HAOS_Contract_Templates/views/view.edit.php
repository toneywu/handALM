<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_Contract_TemplatesViewEdit extends ViewEdit
{

    function Display() {
        /* echo '<input name="system_header_id" id="system_header_id" value="" type="hidden">';*/
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
        
        
        if($this->bean->id==''){
            $this->bean->enabled_flag=1;
        }
        $modules = array(
            
            'HAOS_Contract_Templates',
            );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };

        parent::Display();
        
    }

    public function preDisplay() {
      global $app_list_strings;
      echo "<input type='hidden' id='viewtype' value='AOS_Contracts'/>";
      echo '<input type="hidden" name="settlement_period_c" id="settlementperiodhidden" value="'.get_select_options_with_id($app_list_strings['settlement_period_list'], '').'">';
      echo '<input type="hidden" id="number_of_periods_list" value="'.get_select_options_with_id($app_list_strings['haos_number_of_periods'], '').'"/>';
      parent::preDisplay();
  }
}