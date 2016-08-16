<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HIT_Rack_AllocationsViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;


/*        foreach ($_REQUEST as $key => $value){
          echo "{$key} = {$value}<br/>";
        }
*/
        
        if (isset($_REQUEST["hit_racks_id"])) { //从Subpanel直接创建时
            $this->bean->rack = $_REQUEST["hit_racks_name"];
            $this->bean->hit_racks_id = $_REQUEST["hit_racks_id"];

        };

        parent::Display();
    }


}
