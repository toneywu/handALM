<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAA_Integration_System_Def_HeadersViewDetail extends ViewDetail {

	function HAA_Integration_System_Def_HeadersViewDetail(){
 		parent::ViewDetail();
 	}
	
	function display(){
		$this->populateInterface();
		parent::display();
	}
	function populateInterface(){
		global $app_list_strings;
		 $bean_interface= BeanFactory::getBean('HAA_Interfaces', $this->bean->haa_interfaces_id_c);
		 if ($bean_interface) { 
		 $this->bean->link_system = isset($bean_interface->link_system)?$bean_interface->link_system:'';
		 $this->bean->interface_type = isset($bean_interface->interface_type)?$bean_interface->interface_type:'';
		 foreach ($app_list_strings['haa_interface_type_list'] as $key => $value) {
            if($this->bean->interface_type==$key)
            {   
                //var_dump($this->bean->interface_type);
                $this->bean->interface_type=$value;
            }
        }
     }
	}
	
}
?>