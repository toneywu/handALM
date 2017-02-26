<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_PaymentsViewEdit extends ViewEdit
{

    function Display() {
        //--------------
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->haa_frameworks_id_c)?"":$this->bean->haa_frameworks_id_c;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
        ///-----------------


        $modules = array(
            'HAOS_Payments',
            'HAOS_Payment_Invoices',
            );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };
        echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
       echo '<script type="text/javascript" src="modules/HAOS_Payments/js/HAOS_Payments_editview.js"></script>';
        
        // $('#payment_date').bind('blur',function(){
        //     $('#payment_date').val();

        // });
        // echo '<script type="text/javascript"> 
        //     function getPeriods(){

        //     }

        

        //     setInterval(function() { getPeriods(starttime); }, 50);

        //  </script>';


        //LOV
        $this->populateProductInfo();

        parent::Display();
    }


            //增加LOV逻辑
    function populateProductInfo(){
       $bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id1_c);
       //var_dump($bean_contact);
       if ($bean_contact) {          
             //$line_data = json_encode($row);
          $this->bean->contact_number = $bean_contact->employee_number_c; 
          $this->bean->contact_name =$bean_contact->chinese_name_c;
             //   
        }
    }
}

