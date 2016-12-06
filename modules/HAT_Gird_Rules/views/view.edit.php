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
		parent::Display();

    }

}//end class
