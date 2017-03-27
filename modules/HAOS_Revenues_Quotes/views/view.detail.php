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
    $this->displayLineItems();
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
               triger_setFF($("#haa_ff_id").val(),"HAOS_Revenues_Quotes","DetailView");
               $("a.collapsed").click();
               
           }</script>';
           echo '<script>call_ff()</script>';
       }
   }

   echo '<script>if($("#clear_status").val()=="Cleared"){
              $("#delete_button").css("display","none");
   }</script>';
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
            //$this->bean->source_class = '';
        }
    }
    else if($this->bean->source_code=="HAT_Asset_Trans_Batch"){
        $parent_bean= BeanFactory::getBean('HAT_Asset_Trans_Batch', $this->bean->source_id);
        if ($parent_bean) { 
            $this->bean->source_name = isset($parent_bean->name)?$parent_bean->name:'';
            $this->bean->source_number = isset($parent_bean->tracking_number)?$parent_bean->tracking_number:'';
            $this->bean->source_type = isset($parent_bean->event_type)?$parent_bean->event_type:'';
            //$this->bean->source_class = '';
        }
    }
     else if($this->bean->source_code=="HAM_WO"){
        $parent_bean= BeanFactory::getBean('HAM_WO', $this->bean->source_id);
        if ($parent_bean) { 
            $this->bean->source_name = isset($parent_bean->name)?$parent_bean->name:'';
            $this->bean->source_number = isset($parent_bean->wo_number)?$parent_bean->wo_number:'';
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

    $sql = "SELECT pg.id, pg.group_id FROM aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.parent_type = '".$focus->object_name."' AND pg.parent_id = '".$focus->id."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";

    $result = $focus->db->query($sql);
    $sep = get_number_seperators();
    $html ="<script>$('#line_items').parent().prev().remove();</script>";
    echo $html;
    $html .= "<table border='0' width='100%' cellpadding='0' cellspacing='0'>";

    $i = 0;
    $productCount = 0;
    $serviceCount = 0;
    $group_id = '';
    $groupStart = '';
    $groupEnd = '';
    $product = '';
    $service = '';

    while ($row = $focus->db->fetchByAssoc($result)) {
        $line_item = new AOS_Products_Quotes();
        $line_item->retrieve($row['id']);
        $html .="<tr>";
        $html .="<td scope='col' width='12.5%'>".$mod_strings['LBL_LINE_ITEM_TYPE'].":</td>
        <td width='37.5%'>".$app_list_strings['haos_line_item_type_list'][$line_item->line_item_type_c]."</td>
        <td scope='col' width='12.5%'>".$mod_strings['LBL_PART_NUMBER'].":</td>
        <td width='37.5%'>".$line_item->part_number."</td>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_NAME'].":</td>
        <td width='37.5%'>".$line_item->name."</td>
        <td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_QTY'].":</td>
        <td width='37.5%'>".$line_item->product_qty."</td>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_LIST_PRICE'].":</td>
        <td width='37.5%'>".$line_item->product_list_price."</td>
        <td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_DISCOUNT'].":</td>
        <td width='37.5%'>".$line_item->PRODUCT_PRODUCT_DISCOUNT."</td>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_UNIT_PRICE'].":</td>
        <td width='37.5%'>".$line_item->product_unit_price."</td>
        <td scope='col' width='12.5%'>".$mod_strings['LBL_VAT_AMT'].":</td>
        <td width='37.5%'></td>";
        $html .="</tr>";
        $html .="<tr>";
        $html .="<td scope='col' width='12.5%'>".$mod_strings['LBL_PRODUCT_TOTAL_PRICE'].":</td>
        <td width='37.5%'>".$line_item->product_unit_price."</td>
        <td scope='col' width='12.5%'></td><td width='37.5%'></td>";
        $html .="</tr>";
    }
    $html .= $groupStart.$product.$service.$groupEnd;
    $html .= "</table>";
 
    echo '<script src="modules/HAOS_Revenues_Quotes/line_items.js"></script>';
    echo "<script>replace_display_lines(" .json_encode($html).",'line_items'".");</script>";
}
}
?>
