<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_Revenues_QuotesViewDetail extends ViewDetail  {
	function HAOS_Revenues_QuotesViewDetail(){
		parent::ViewDetail();
	}
	
	function display(){
		$this->populateBillContactInfo();
		$this->populateParentInfo();
		$this->populateInvoicesInfo();
		parent::display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if(isset($this->bean->parent_eventtype_id) && ($this->bean->parent_eventtype_id)!=""){
			$hat_eventtype_id = $this->bean->parent_eventtype_id;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id);
			$ff_id = $bean_event_type->haa_ff_id;

			$ff_id = $bean_event_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
					triger_setFF($("#haa_ff_id").val(),"HAOS_Revenues_Quotes","DetailView");
					$(".expandLink").click();
					
				}</script>';
				echo '<script>call_ff()</script>';
			}
		}
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
