<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_UOM_ConversionsViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;

/*        foreach ($_REQUEST as $key => $value){
          echo "{$key} = {$value}<br/>";
        }
*/
        if (isset($this->bean->aos_products_haa_uom_conversions_1aos_products_ida) && $this->bean->aos_products_haa_uom_conversions_1aos_products_ida!="") { //从Subpanel直接创建时，自动带出物料对应的主单位

                $bean_aos_products = BeanFactory::getBean('AOS_Products',$this->bean->aos_products_haa_uom_conversions_1aos_products_ida);
                $current_primary_uom_id = $bean_aos_products->haa_uom_id_c;

                //读取到当前物料的主单位
                $bean_uom = BeanFactory::getBean('HAA_UOM',$current_primary_uom_id);
                //读取到当前物料主单位对应的物料分类

                $current_primary_uom_symbol = $bean_uom->uom_symbol;
                $current_primary_uom_conversion = $bean_uom->conversion;
                $current_uom_classes = $bean_uom->haa_uom_classes_id;
                $bean_uom_classes = BeanFactory::getBean('HAA_UOM_Classes',$current_uom_classes);
                //读取当前物料对应主单位，对应的基准单位
                //单位换算只基于基准单位。
                $this->bean->source_uom = $bean_uom_classes->base_unit_name;
                $base_uom_symbol = $bean_uom_classes->base_unit_symbol;

                if (!isset($this->bean->id)) { //如果是新建编辑模式
                    $this->bean->source_uom_class = $bean_uom->uom_class;//默认带出当前物料的主单位分类
                    $this->bean->source_uom_class_id = $bean_uom->haa_uom_classes_id;
                    $this->bean->destination_uom_class = $bean_uom->uom_class;//默认当前的目标分类与主单位分类一致
                    $this->bean->destination_uom_classes_id = $bean_uom->haa_uom_classes_id;
                } else {
                    $this->bean->conversion = floatval($this->bean->conversion);
                }
                $this->bean->primary_uom_conversion_str = '1 '.$current_primary_uom_symbol.' = '.floatval($current_primary_uom_conversion).' '.$base_uom_symbol;
                $this->bean->primary_uom_conversion = floatval($current_primary_uom_conversion);
                $this->bean->primary_uom = $bean_uom->name;
                $this->bean->name = $bean_aos_products->name;
            }


        parent::Display();
    }


}
