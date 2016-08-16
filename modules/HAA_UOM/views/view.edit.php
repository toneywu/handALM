<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_UOMViewEdit extends ViewEdit
{

    function Display() {
        
        global $current_user;
        global $db;
        
/*        foreach ($_POST as $key => $value){
          echo "{$key} = {$value}<br/>";
        }*/

        if (isset($_POST["haa_uom_classes_id"]) && $_POST["haa_uom_classes_id"]!="") { //从Subpanel直接创建时，不可修改分类
            $this->bean->haa_uom_classes_id = $_POST["haa_uom_classes_id"];
            $this->bean->uom_class = $_POST["haa_uom_classes_name"];
            echo '<script>$(document).ready(function(){$("#btn_uom_class,#btn_clr_uom_class").hide();$("#uom_class").attr("readonly",true);$("#uom_class").css("background-color","#efefef");})</script>';
        };

        if (isset($this->bean->haa_uom_classes_id)) { //如果是编辑模式,或书籍Class_id
            $current_class_id = $this->bean->haa_uom_classes_id;
            if ($current_class_id !="") { //通过当前的Class_id，读取到对应的Base_Unit
                $bean_uom_class = BeanFactory::getBean('HAA_UOM_Classes',$current_class_id);
                $this->bean->base_unit = $bean_uom_class->base_unit_name;        
            }
        } else {
            $this->bean->base_unit = "BASE UNIT";
        }

        if (isset($this->bean->conversion)) {
            $this->bean->conversion = floatval($this->bean->conversion);
        }


        parent::Display();
    }


}
