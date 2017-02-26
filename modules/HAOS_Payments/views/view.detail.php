<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_PaymentsViewDetail extends ViewDetail {

	function HAOS_PaymentsViewDetail(){
 		parent::ViewDetail();
 	}
	


	function display(){
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

		$this->populateProductInfo();
		parent::display();
	}
	function populateProductInfo(){
		 $bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id1_c);
       //var_dump($bean_contact);
       if ($bean_contact) { 
          $this->bean->contact_number = $bean_contact->employee_number_c; 
          $this->bean->contact_name =$bean_contact->chinese_name_c;          
        }
	}
}
?>
