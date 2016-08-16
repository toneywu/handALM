<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_WOOPViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

        /*echo "string";
        foreach ($_REQUEST as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/
        if(isset($_REQUEST['ham_wo_id']) && $_REQUEST['ham_wo_id'] !="") {
            $wo_id = $_REQUEST['ham_wo_id'];

			$bean_wo = BeanFactory::getBean('HAM_WO',$wo_id);
			//$bean_woop = BeanFactory::getBean('HAM_WOOP',$wo_id);

			$this->bean->wo_number = "[".$bean_wo->wo_number."] ".$bean_wo->name;
            $this->bean->ham_wo_id = $wo_id;

            global $db;
                $sel ="SELECT woop_number
                            FROM ham_woop
                            WHERE ham_woop.deleted =0 AND ham_wo_id = '".$wo_id."'
                                ORDER BY ham_woop.woop_number DESC
                                LIMIT 0 , 1";
            $bean_woop_list =  $db->query($sel);
            $last_woop_number = 0;
            while ( $last_woop = $db->fetchByAssoc($bean_woop_list) ) {
                    $last_woop_number = $last_woop['woop_number'];
            }

            if ($last_woop_number>0) {
                $this->bean->woop_number = floor(($last_woop_number+10)/10)*10;
            } else {
                $this->bean->woop_number = "10";
            }

        }

        parent::Display();
    }


}
