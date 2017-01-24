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
		 $bean_interface= BeanFactory::getBean('HAA_Interfaces', $this->bean->haa_interfaces_id_c);
		 if ($bean_interface) { 
		 $this->bean->link_system = isset($bean_interface->link_system)?$bean_interface->link_system:'';
		 $this->bean->interface_type = isset($bean_interface->interface_type)?$bean_interface->interface_type:'';
		 if($this->bean->interface_type =="WS"){
		 	$this->bean->interface_type ="WebService";
		 }else if($this->bean->interface_type =="TEXT"){
		 	$this->bean->interface_type ="文本";
		 }
     }
	}
	
}
?>