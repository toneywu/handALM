<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_Revenues_QuotesViewEdit extends ViewEdit {
	function HAOS_Revenues_QuotesViewEdit(){
		parent::ViewEdit();
	}
	
	function display(){

		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));//分配显示业务框架

       //TODO 收支项的编码规则取值地方待补充
		$bean_site = BeanFactory :: getBean('HAM_Maint_Sites', $this->ham_maint_sites_id);
		$bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule', $bean_site->wo_haa_numbering_rule_id);

		if (!empty ($bean_numbering)) {
				//取得当前的编号
			$this->revenue_quote_number = $bean_numbering->nextval;
				//预生成下一个编号，并保存在$bean_numbering中
			$current_number = $bean_numbering->current_number + 1;
			$current_numberstr = "" . $current_number;
			$padding_str = "";
			for ($i = 0; $i < $bean_numbering->min_num_strlength; $i++) {
				$padding_str = $padding_str +"0";
			}
			$padding_str = substr($padding_str, 0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
			$nextval_str = $bean_numbering->perfix . $padding_str;
			$bean_numbering->current_number = $current_number;
			$bean_numbering->nextval = $nextval_str;
			$bean_numbering->save();
		}
		$this->ss->assign('REVENUE_QUOTE_NUMBER',$this->revenue_quote_number);
		//分配自动编号
		$this->populateBillContactInfo();
		$this->populateParentInfo();
		$this->populateInvoicesInfo();

		//*********************处理FF界面 START********************
		if(isset($this->bean->parent_eventtype_id) && ($this->bean->parent_eventtype_id)!=""){
			$hat_eventtype_id = $this->bean->parent_eventtype_id;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id);
			$ff_id = $bean_event_type->haa_ff_id;
		}

		parent::display();
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
		echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';
		//如果已经选择事件类型，无论是否事件类型对应的FlexForm有值，值将界面展开。
		if(isset($this->bean->parent_eventtype_id) && ($this->bean->parent_eventtype_id)!=""){
			echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
		} /*else {
			echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
		}*/

		//*********************处理FF界面 END********************

	}
	

	function populateBillContactInfo(){
		$bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id_c);
		if ($bean_contact) { 
			$this->bean->contract_name = isset($bean_contact->chinese_name_c)?$bean_contact->chinese_name_c:'';
		}
	}

	function populateInvoicesInfo(){
		$bean= BeanFactory::getBean('AOS_Invoices', $this->bean->aos_invoices_id_c);
		if ($bean) { 
			$this->bean->cleared_status =$app_list_strings['invoice_status_dom'][isset($bean->status)?$bean->status:''];
		}
	}

	function populateParentInfo(){
		//需要根据来源类型模块分别设置返回值
		//如果有新的模块来源需要在这里增加分支，这里不适合用弹性关联
		if($this->bean->source_code=="AOS_Contracts"){
			$parent_bean= BeanFactory::getBean('AOS_Contracts', $this->bean->source_id);
			if ($parent_bean) { 
				$this->bean->source_name = isset($parent_bean->name)?$parent_bean->name:'';
				$this->bean->source_number = isset($parent_bean->contract_number_c)?$parent_bean->contract_number_c:'';
				$this->bean->source_type = isset($parent_bean->type_c)?$parent_bean->type_c:'';
				$this->bean->source_class = isset($parent_bean->contract_subtype_c)?$parent_bean->contract_subtype_c:'';
			}
		}
	}
}
?>
