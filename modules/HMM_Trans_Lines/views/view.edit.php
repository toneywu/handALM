<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HMM_Trans_LinesViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

        //在修改记录时，需要读取一些相关的字段。
        if (isset($this->bean->hat_event_type_id) && $this->bean->hat_event_type_id!="") { //读取EventType相关的值
            $bean_event_type = BeanFactory::getBean('HAT_EventType',$this->bean->hat_event_type_id);
            $this->bean->trans_basic_type = $bean_event_type->basic_type;
        }

        if (isset($this->bean->item_id) && $this->bean->item_id!="") { //读取Product相关的值
            $bean_aos_products = BeanFactory::getBean('AOS_Products',$this->bean->item_id);
            $this->bean->secondary_unit_defaulting = $bean_aos_products->secondary_unit_defaulting_c;
            $this->bean->tracking_uom = $bean_aos_products->tracking_uom_c;
        }

        if (isset($this->bean->from_location_id) && $this->bean->from_location_id!="") { //读取Product相关的值
            $bean_from_location = BeanFactory::getBean('HAT_Asset_Locations',$this->bean->from_location_id);
            $this->bean->from_locator_control = $bean_from_location->inventory_mode;
            //echo("<h1>hello</h1>");
        }

        if (isset($this->bean->to_location_id) && $this->bean->to_location_id!="") { //读取Product相关的值
            $bean_to_location = BeanFactory::getBean('HAT_Asset_Locations',$this->bean->to_location_id);
            $this->bean->to_locator_control = $bean_to_location->inventory_mode;
            //echo("<h1>hello work ".$this->bean->from_locator_control."</h1>");
        }

        parent::Display();
    }


}
