<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Gird_RulesViewEdit extends ViewEdit
{

	function Display() {

        //本函数完成以下事项
        //1、初始化Framework
        //2、初始化GIS信息
        //3、加载基于AOS_Products的动态界面模板（FF）
        //4、正常Display
        //5、处理Framework中的相关字段
        //6、基于FF判断是否展开界面

        //1、初始化Framework
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->haa_frameworks_id)?"":$this->bean->haa_frameworks_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('FRAMEWORK',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id'));

        //2、加载基于code_asset_location_type_id的动态界面模板（FF）
        if(isset($this->bean->code_asset_location_type_id) && ($this->bean->code_asset_location_type_id)!=""){
            //判断是否已经设置有位置分类，如果有分类，则进一步的加载分类对应的FlexForm
            $location_type_id = $this->bean->code_asset_location_type_id;
            $bean_code = BeanFactory::getBean('HAA_Codes',$location_type_id);
            if (isset($bean_code->haa_ff_id)) {
                $ff_id = $bean_code->haa_ff_id;
            }
            if (isset($ff_id) && $ff_id!="") {
                //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
                //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }
        }

		parent::Display();

    }

}//end class
