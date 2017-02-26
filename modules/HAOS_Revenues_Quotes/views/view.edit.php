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

		
		$this->populateBillContactInfo();
		$this->populateParentInfo();
		$this->populateInvoicesInfo();

		//*********************处理FF界面 START********************
        require_once('modules/HAA_FF/ff_include_editview.php');
        initEditViewByFF((!empty($this->bean->hat_eventtype_id_c))?$this->bean->hat_eventtype_id_c:"",'HAT_EventType');
		//*********************处理FF界面 END********************

		$html .= "<script>
		if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}
	</script>";
	echo $html;
	parent::display();


		$this->displayLineItems();
		echo '<script>removeFromValidate("EditView","account_name");
		addToValidate("EditView", "product_line_item_type_c0","varchar", true,SUGAR.language.get(module_sugar_grp1, "LBL_LINE_ITEM_TYPE"));
		addToValidate("EditView", "product_name0","varchar", true,SUGAR.language.get(module_sugar_grp1, "LBL_NAME"));
		addToValidate("EditView", "product_product_list_price0","float", true,SUGAR.language.get(module_sugar_grp1, "LBL_PRODUCT_LIST_PRICE"));
		addToValidate("EditView", "product_product_unit_price0","float", true,SUGAR.language.get(module_sugar_grp1, "LBL_PRODUCT_UNIT_PRICE"));
		addToValidate("EditView", "product_product_total_price0","float", true,SUGAR.language.get(module_sugar_grp1, "LBL_PRODUCT_TOTAL_PRICE"));
		document.getElementById("period_name").value="'.$this->bean->period_name.'";
	</script>';
	
}


function populateBillContactInfo(){
	$bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id_c);
	if ($bean_contact) { 
		$this->bean->contract_name = isset($bean_contact->chinese_name_c)?$bean_contact->chinese_name_c:'';
		$this->bean->contract_number = isset($bean_contact->employee_number_c)?$bean_contact->employee_number_c:'';
	}
}

function populateInvoicesInfo(){
	global $app_list_strings;
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
	else if($this->bean->source_code=="HAT_Incidents"){
		$parent_bean= BeanFactory::getBean('HAT_Incidents', $this->bean->source_id);
		if ($parent_bean) { 
			$this->bean->source_name = isset($parent_bean->name)?$parent_bean->name:'';
			$this->bean->source_number = isset($parent_bean->event_number)?$parent_bean->event_number:'';
			$this->bean->source_type = isset($parent_bean->event_type)?$parent_bean->event_type:'';
			$this->bean->source_class = '';
		}
	}
	else if($this->bean->source_code=="HAT_Asset_Trans_Batch"){
        $parent_bean= BeanFactory::getBean('HAT_Asset_Trans_Batch', $this->bean->source_id);
        if ($parent_bean) { 
            $this->bean->source_name = isset($parent_bean->name)?$parent_bean->name:'';
            $this->bean->source_number = isset($parent_bean->tracking_number)?$parent_bean->tracking_number:'';
            $this->bean->source_type = isset($parent_bean->event_type)?$parent_bean->event_type:'';
            $this->bean->source_class = '';
        }
    }
}

function displayLineItems(){
	$focus=$this->bean;
	$params = array('currency_id' => $focus->currency_id);

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$enable_groups = (int)$sugar_config['aos']['lineItems']['enableGroups'];
	$total_tax = (int)$sugar_config['aos']['lineItems']['totalTax'];
	$html = '';

	require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
	$line_item = new AOS_Products_Quotes();
	$html = '<script src="modules/HAOS_Revenues_Quotes/line_items.js"></script>';
	if(file_exists('custom/modules/HAOS_Revenues_Quotes/line_items.js')){
		$html = '<script src="custom/modules/HAOS_Revenues_Quotes/line_items.js"></script>';
	}
	$html .= '<script language="javascript">var sig_digits = '.$locale->getPrecision().';';
	$html .= 'var module_sugar_grp1 = "'.$focus->module_dir.'";';
	$html .= 'var enable_groups = '.$enable_groups.';';
	$html .= 'var total_tax = '.$total_tax.';';
	$html .= '</script>';
	echo $html;

	$html .= "<table border='0' cellspacing='4' width='100%' id='lineItems'></table>";

	$html .= '<input type="hidden" name="lineitemtypehidden" id="lineitemtypehidden" value="'.get_select_options_with_id($app_list_strings['haos_line_item_type_list'], '').'">';

	$html .= '<input type="hidden" name="vathidden" id="vathidden" value="'.get_select_options_with_id($app_list_strings['vat_list'], '').'">
	<input type="hidden" name="discounthidden" id="discounthidden" value="'.get_select_options_with_id($app_list_strings['discount_list'], '').'">';

	if($focus->id != '') {
		$sql = "SELECT pg.id, pg.group_id FROM aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.parent_type = '" . $focus->object_name . "' AND pg.parent_id = '" . $focus->id . "' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
		$result = $focus->db->query($sql);
		$html .= "<script>
		if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}
	</script>";


	while ($row = $focus->db->fetchByAssoc($result)) {
		$line_item->retrieve($row['id']);      
	}
}

$line_item = json_encode($line_item->toArray());
echo '<script src="modules/HAOS_Revenues_Quotes/line_items.js"></script>';
echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
echo "<script>insertLineItems(" . $line_item . ");</script>";

}
}
?>
