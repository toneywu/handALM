<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_Work_Center_PeopleViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;
		
		
		
		//echo $this->bean->linked_user_c;
		//echo 'id'.$bean_contact->linked_user_c;
		//echo 'id'.$bean_contact->user_id_c;
		
        /*echo "string";
        foreach ($current_user as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/
		
	    if(isset($_REQUEST['ham_work_center_res_id']) && $_REQUEST['ham_work_center_res_id'] !="") {
            $ham_work_center_res_id = $_REQUEST['ham_work_center_res_id'];

			$bean_wo = BeanFactory::getBean('HAM_Work_Center_Res',$ham_work_center_res_id);

			//$this->bean->ham_work_center_res_name = $bean_wo->name;
			//$this->bean->ham_work_center_res_name = 'test';
            $this->bean->work_center_res_id = $ham_work_center_res_id;
			
        }
		
	if(isset($_REQUEST['contact_id']) && $_REQUEST['contact_id'] !="") {
		$bean_contact = BeanFactory::getBean('Contacts', $this->bean->contact_id);
        if ($bean_contact) 
		{ // test if $bean_location was loaded successfully
                $this->bean->organization_name = isset($bean_contact->account_name)?$bean_contact->account_name:'';
				$this->bean->user_name=$bean_contact->linked_user_c;
        }
    }
	
	parent::Display();
	}


}
