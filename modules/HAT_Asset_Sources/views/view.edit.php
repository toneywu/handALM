<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Asset_SourcesViewEdit extends ViewEdit
{

	function Display() {

         //1、初始化Framework
        if (empty($this->bean->hat_framework_id)) {
            //从Session加载Business Framework字段的值
            $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);

            if(isset($beanFramework)) {
                $this->bean->hat_framework_id = $_SESSION["current_framework"];
                $this->bean->framework = $beanFramework->name;
            }
        }
        //当前字段由Relate类型变为只读，不可修改
        $html ='<input type="hidden" name="hat_framework_id" value="'.$this->bean->hat_framework_id .'"><input type="hidden" name="framework" value="'.$this->bean->framework .'">'. $this->bean->framework;
        $this->ss->assign('FRAMEWORK',$html);

		parent::Display();

        //处理Framework中的相关字段
        if(isset($beanFramework)) {
            if($beanFramework->supplier_field_rule=='TEXT'){
                $current_supplier_org = isset($this->bean->supplier_org)?($this->bean->supplier_org):"";
                $current_supplier_org_id=isset($this->bean->supplier_org_id)?$this->bean->supplier_org_id:"";
                $current_supplier_desc=isset($this->bean->supplier_desc)?$this->bean->supplier_desc:"";
                echo ('<script>$("#supplier_org").parent().html(\'<input type="hidden" name="supplier_org" id="supplier_org" value="'.$current_supplier_org.'"/><input type="hidden" name="supplier_org_id" id="supplier_org_id" value="'.$current_supplier_org_id.'"/><input type="text" name="supplier_desc" id="supplier_desc" value="'.$current_supplier_desc.'"/>\');</script>');
            }

        }


    }

}//end class
