<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_ACT_OPViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

        /*echo "string";
        foreach ($_REQUEST as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/
	    $ham_act_id='';
		
        if(isset($_REQUEST['ham_act_id']) && $_REQUEST['ham_act_id'] !="") {
            $ham_act_id = $_REQUEST['ham_act_id'];
			$bean_wo = BeanFactory::getBean('HAM_ACT',$ham_act_id);
			$this->bean->ham_act_id_rule =$bean_wo->name;
			$this->bean->ham_act_id =$ham_act_id;
        }
		
			global $db;
			$sel ="SELECT activity_op_number
						FROM ham_act_op
						WHERE ham_act_op.deleted =0 AND ham_act_op.ham_act_id = '".$ham_act_id."'
							ORDER BY ham_act_op.activity_op_number DESC
							LIMIT 0 , 1";

			
            $bean_woop_list =  $db->query($sel);
            $last_woop_number = 0;
            while ( $last_woop = $db->fetchByAssoc($bean_woop_list) ) {
                    $last_woop_number = $last_woop['activity_op_number'];
					
					
            }
           //echo 'last_woop_number='.$last_woop_number;
            if ($last_woop_number>0) {
                $this->bean->activity_op_number = floor(($last_woop_number+10)/10)*10;
            } else {
                $this->bean->activity_op_number = "10";
            }

        parent::Display();
    }


}
