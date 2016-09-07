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
        parent::display();


        //如果已经选择位置分类，无论是否位置分类对应的FlexForm有值，值将界面展开。
        //（如果没有位置分类，则界面保持折叠状态。）
        if(isset($this->bean->code_asset_location_type_id) && ($this->bean->code_asset_location_type_id)!=""){
                    echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
                echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
    }

}

