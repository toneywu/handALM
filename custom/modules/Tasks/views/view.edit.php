<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class TasksViewEdit extends ViewEdit
{
	public function __construct()
    {
        parent::ViewEdit();
        $this->useForSubpanel = true;
        $this->useModuleQuickCreateTemplate = true;
    }
    
	function display()
	{
		require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_framework_id_c')); 
		//*********************处理FF界面 START********************
		if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
            //判断是否已经设置合同的列表代码，如果有合同的列表代码，则进一步的加载对应的FlexForm
			$haa_codes_id_c = $this->bean->haa_codes_id_c;
			$bean_business_type = BeanFactory::getBean('HAA_Codes',$haa_codes_id_c);
			$ff_id = $bean_business_type->haa_ff_id;
            //如果有对应的FlexForm，需建立一个对象去存储FF_ID
            //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
		} 
		parent::display();
        $ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
        echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';

		if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
                	echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
            	echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
		//*********************处理FF界面 END********************
	}
}