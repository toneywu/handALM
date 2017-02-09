<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_IncidentsViewDetail extends ViewDetail  {
	function HAT_IncidentsViewDetail(){
		parent::ViewDetail();
	}
	
	function display(){
		$this->populateRelateInfo();
		parent::display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if(isset($this->bean->hat_eventtype_id_c) && ($this->bean->hat_eventtype_id_c)!=""){
			$hat_eventtype_id = $this->bean->hat_eventtype_id_c;
			$bean_event_type = BeanFactory::getBean('HAT_EventType',$hat_eventtype_id);
			$ff_id = $bean_event_type->haa_ff_id;

			$ff_id = $bean_event_type->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
					triger_setFF($("#haa_ff_id").val(),"HAT_Incidents","DetailView");
					$("a.collapsed").click();
					
				}</script>';
				echo '<script>call_ff()</script>';
			}
		}
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
