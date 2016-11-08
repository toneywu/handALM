<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_EventManegerViewEdit extends ViewEdit {
	function HAT_EventManegerViewEdit(){
		parent::ViewEdit();
	}
	
	function display(){

		require_once('modules/HAA_Frameworks/orgSelector_class.php');
		$current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
		$current_module = $this->module;
		$current_action = $this->action;
		$this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));	


		$this->populateRelateInfo();

		//*********************处理FF界面 START********************
		if(isset($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c)!=""){
			$hat_eventtype_id_c = $this->bean->hat_eventtype_id_c;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id_c);
			$ff_id = $bean_event_type->haa_ff_id;
		}

		parent::display();
		$ff_id_field = '<input id=haa_ff_id name=haa_ff_id type=hidden '.(isset($ff_id)?'value='.$ff_id:'').'>';
		echo '<script>if($("#haa_ff_id").length==0) {  $("#EditView").append("'.$ff_id_field.'");}</script>';
		//如果已经选择事件类型，无论是否事件类型对应的FlexForm有值，值将界面展开。
		if(isset($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c)!=""){
			echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
		} /*else {
			echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
		}*/

		//*********************处理FF界面 END********************

	}
	
	function populateRelateInfo(){
		 global $app_list_strings;
		$bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id_c);
		if ($bean_contact) { 
			$this->bean->person_number = isset($bean_contact->employee_number_c)?$bean_contact->employee_number_c:'';
			$this->bean->person_name = isset($bean_contact->chinese_name_c)?$bean_contact->chinese_name_c:'';
		}
		$bean_asset= BeanFactory::getBean('HAT_Assets', $this->bean->hat_assets_id_c);
		if ($bean_asset) { 
			$this->bean->asset_number = isset($bean_asset->asset_number)?$bean_asset->asset_number:'';
			$this->bean->asset_name = isset($bean_asset->asset_desc)?$bean_asset->asset_desc:'';
		}
		$bean_revenue= BeanFactory::getBean('HAOS_Revenues_Quotes', $this->bean->haos_revenues_quotes_id);
		if ($bean_revenue) { 
			$this->bean->revenue_quote_number = isset($bean_revenue->revenue_quote_number)?$bean_revenue->revenue_quote_number:'';
			$this->bean->clear_status = $app_list_strings['haos_revenue_clear_status_list'][isset($bean_revenue->clear_status)?$bean_revenue->clear_status:''];
			$this->bean->invoice_number = isset($bean_revenue->invoice_number)?$bean_revenue->invoice_number:'';
			$bean_invoice= BeanFactory::getBean('AOS_Invoices', $bean_revenue->aos_invoices_id_c);
			if ($bean) { 
				$this->bean->cleared_status =$app_list_strings['invoice_status_dom'][isset($bean_invoice->status)?$bean_invoice->status:''];
			}
		}

	}
}
?>
