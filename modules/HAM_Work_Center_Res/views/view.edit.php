<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAM_Work_Center_ResViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

        /*echo "string";
        foreach ($_REQUEST as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/
        if(isset($_REQUEST['ham_work_centers_id']) && $_REQUEST['ham_work_centers_id'] !="") {
            $ham_work_centers_id = $_REQUEST['ham_work_centers_id'];
			//echo 'work_center_id ='.$ham_work_centers_id;
			$bean_wo = BeanFactory::getBean('HAM_Work_Centers',$ham_work_centers_id);
			//echo 'ham_work_center_name ='.$bean_wo->name;
            $this->bean->work_center_id = $ham_work_centers_id;
			$this->bean->ham_work_center_name= $bean_wo->name;
        }

        parent::Display();
    }


}
