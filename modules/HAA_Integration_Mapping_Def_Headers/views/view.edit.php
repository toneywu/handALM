<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_Integration_Mapping_Def_HeadersViewEdit extends ViewEdit
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
            'HAA_Integration_Mapping_Def_Lines',
            'HAA_Integration_Mapping_Def_Headers',
            );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };

        parent::Display();
        //if($this->bean->haa_interfaces_id_c){
        $sql="SELECT
        a.id
        FROM
        HAA_Integration_System_Def_Headers a
        WHERE
        a.haa_interfaces_id_c ='".$this->bean->haa_interfaces_id_c."'";
        $result=$this->bean->db->query($sql);
        $row=$this->bean->db->fetchByAssoc($result);
        echo '<input name="system_header_id" id="system_header_id" value="'.$row["id"].'" type="hidden">';

    //}
    }
}