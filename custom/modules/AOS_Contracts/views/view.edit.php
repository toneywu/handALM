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
    require_once('modules/HAA_FF/ff_include_editview.php');
    initEditViewByFF((!empty($this->bean->haa_codes_id_c))?$this->bean->haa_codes_id_c:"",'HAA_Codes');
    //*********************处理FF界面 END********************

   parent::display();


 }
 public function preDisplay() {
  global $app_list_strings;
  echo "<input type='hidden' id='viewtype' value='AOS_Contracts'/>";
  echo '<input type="hidden" name="settlement_period_c" id="settlementperiodhidden" value="'.get_select_options_with_id($app_list_strings['settlement_period_list'], '').'">';
  echo '<input type="hidden" id="number_of_periods_list" value="'.get_select_options_with_id($app_list_strings['haos_number_of_periods'], '').'"/>';
  parent::preDisplay();
}

}