<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_Integration_System_Def_HeadersViewEdit extends ViewEdit
{

    function Display() {
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
            'HAA_Integration_System_Def_Lines',
            'HAA_Integration_System_Def_Headers',
            );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };

        parent::Display();
        if($this->bean->effected_flag==1){
     echo "<script>
            $('#effected_flag').val(1);
            $('#effected_flag').attr('checked',true);
            document.getElementById('btn_own_interface').disabled=true;
    document.getElementById('btnAddNewLine').disabled=true;
    $('#name').attr('disabled',true);
    $('#interface_type').attr('disabled',true);
    $('#link_system').attr('disabled',true);
    $('#enabled_flag').attr('disabled',true);
    $('#description').attr('disabled',true);
    for (var i =0 ; i < 100; i++) {
       document.getElementById('btn_edit_line'+i).disabled=true;
    }
            </script>";
        }else{
            echo "<script>
            $('#effected_flag').val(0);
            $('#effected_flag').attr('checked',false);
            document.getElementById('btn_own_interface').disabled=false;
    $('#name').attr('disabled',false);
    $('#interface_type').attr('disabled',false);
    $('#link_system').attr('disabled',false);
    $('#enabled_flag').attr('disabled',false);
    $('#description').attr('disabled',false);
    document.getElementById('btnAddNewLine').disabled=false;

            </script>";
        }

            if($this->bean->enabled_flag==1){
     echo "<script>
            $('#enabled_flag').val(1);
            $('#enabled_flag').attr('checked',true);
            </script>";
        }else{
            echo "<script>
            $('#enabled_flag').val(0);
            $('#enabled_flag').attr('checked',false);
            </script>";
        }
           $bean_interface= BeanFactory::getBean('HAA_Interfaces', $this->bean->haa_interfaces_id_c);
         if ($bean_interface) { 
         $this->bean->link_system = isset($bean_interface->link_system)?$bean_interface->link_system:'';

         echo "<script>
            $('#link_system').val('".$this->bean->link_system."');
            </script>";
         
         $this->bean->interface_type = isset($bean_interface->interface_type)?$bean_interface->interface_type:'';
         if($this->bean->interface_type =="WS"){
            $this->bean->interface_type ="WebService";
         }else if($this->bean->interface_type =="TEXT"){
            $this->bean->interface_type ="文本";
         }
         echo "<script>
            $('#interface_type').val('".$this->bean->interface_type."');
            </script>";
     }
    }
}