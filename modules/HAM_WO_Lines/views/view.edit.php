<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_WO_LinesViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

		
        if(isset($_REQUEST['ham_wo_id']) && $_REQUEST['ham_wo_id'] !="") {
            $wo_id = $_REQUEST['ham_wo_id'];
			$bean_wo = BeanFactory::getBean('HAM_WO',$wo_id);
			$this->bean->wo_number = "[".$bean_wo->wo_number."] ".$bean_wo->name;
            $this->bean->ham_wo_id = $wo_id;
			echo '<input id="account_id" name="account_id" type="hidden" value="'.$bean_wo->account_id.'">';
        }
        parent::Display();
    }


}
