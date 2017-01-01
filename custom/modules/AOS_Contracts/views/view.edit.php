<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class AOS_contractsViewEdit extends ViewEdit
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
    $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
    if (isset($_POST['record'])) {//更改记录时，读取版本号
      $contract_revision=BeanFactory::getBean('AOS_Contracts',$_POST['record']);
      $this->ss->assign('contract_revision',$contract_revision->contract_revision_c);
    }else{//新建时，赋值1
      $this->ss->assign('contract_revision',1);
    }
    
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
		//如果已经选择合同类型，无论是否合同类型对应的FlexForm有值，值将界面展开。
   if(isset($this->bean->haa_codes_id_c) && ($this->bean->haa_codes_id_c)!=""){
     echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
   } else {
     echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
   }
   
		//*********************处理FF界面 END********************
 }
 public function preDisplay() {
  global $app_list_strings;
  echo "<input type='hidden' id='viewtype' value='AOS_Contracts'/>";
  echo '<input type="hidden" name="settlement_period_c" id="settlementperiodhidden" value="'.get_select_options_with_id($app_list_strings['settlement_period_list'], '').'">';
  echo '<input type="hidden" id="number_of_periods_list" value="'.get_select_options_with_id($app_list_strings['haos_number_of_periods'], '').'"/>';
  parent::preDisplay();
}

}