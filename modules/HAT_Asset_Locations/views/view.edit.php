<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Asset_LocationsViewEdit extends ViewEdit
{

    function display(){

        //本函数完成以下事项
        //1、初始化Framework-Site信息
        //2、加载基于code_asset_location_type_id的动态界面模板（FF）
        //3、正常Display
        //4、基于FF判断是否展开界面

        //1、初始化Framework-Site信息
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_site_id = empty($this->bean->ham_maint_sites_id)?"":$this->bean->ham_maint_sites_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('MAINT_SITE',set_site_selector($current_site_id,$current_module,$current_action));

        //2、加载基于code_asset_location_type_id的动态界面模板（FF）
        require_once('modules/HAA_FF/ff_include_editview.php');
        initEditViewByFF((!empty($this->bean->code_asset_location_type_id))?$this->bean->code_asset_location_type_id:"",'HAA_Codes');

        parent::display();


    }

}

