<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Opn_LocationsViewEdit extends ViewEdit
{

    function Display() {
        
        global $current_user;
        global $db;
        
/*        foreach ($_POST as $key => $value){
          echo "{$key} = {$value}<br/>";
        }
*/
        if (isset($_POST["hat_properties_id"]) && $_POST["hat_properties_id"]!="") { //从Subpanel直接创建时，不可修改分类
            $this->bean->property_id = $_POST["hat_properties_id"];
            $this->bean->property = $_POST["hat_properties_name"];
            echo '<script>$(document).ready(function(){$("#btn_property,#btn_clr_property").hide();$("#property").attr("readonly",true);$("#property").css("background-color","#efefef");})</script>';
        };

        parent::Display();
    }


}
