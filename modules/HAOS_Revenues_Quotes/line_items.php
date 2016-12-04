<?php
//！！！！！
//影响子面板 废弃不用，逻辑移到edit和Detial中
function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;


    $enable_groups = (int)$sugar_config['aos']['lineItems']['enableGroups'];
    $total_tax = (int)$sugar_config['aos']['lineItems']['totalTax'];
    $html = '';

    if($view == 'EditView'){
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
$html .= "<script>
insertLineItems(" . $line_item . ");
</script>";

}
else if($view == 'DetailView'){
   params = array('currency_id' => $focus->currency_id);

   $sql = "SELECT pg.id, pg.group_id FROM aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.parent_type = '".$focus->object_name."' AND pg.parent_id = '".$focus->id."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";

   $result = $focus->db->query($sql);
   $sep = get_number_seperators();
   $html ="<script>$('#line_items_span').parent().prev().remove();</script>";
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
}
return $html;
}



?>