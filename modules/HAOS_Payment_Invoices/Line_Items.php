<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

    $sort_order_num = 0;

    $html = '';
    if($view == 'EditView'){
      $html .= '<script src="modules/HAOS_Payment_Invoices/js/line_items.js"></script>';
      $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
		// $html .='<input type="hidden" name="period_status_type" id="period_status_type" value="'.get_select_options_with_id($app_list_strings['haa_period_status'], '').'">';



      $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
         	payl.id,
           payl.haos_payments_id_c payment_name,
           payl.aos_invoices_id_c invoice_id,
           ainv.number invoice_number,
           ainv.name invoice_name,
           ainv.invoice_date,
           ainv.due_date invoice_due_date,
           ainvcs.late_days_c invoice_overdue_days,
           ainvcs.unpaied_amount_c invoice_unpaid_amount,
           payl.amount,
           payl.amount_usdollar,
           payl.description
           from 
             haos_payment_invoices payl,
             aos_invoices ainv
             LEFT JOIN aos_invoices_cstm ainvcs on ainv.id = ainvcs.id_c 
           where 1=1
           and payl.deleted = 0
           and payl.aos_invoices_id_c = ainv.id
           and ainv.id = ainvcs.id_c
           and payl.haos_payments_id_c ='".$focus->id."'
           order by ainv.number asc"
           ;
         	// and ha.id  ='".$focus->id."'"


           $result = $focus->db->query($sql);




           while ($row = $focus->db->fetchByAssoc($result)) {
             $line_data = json_encode($row);
             $html .= "<script>insertLineData(" . $line_data . ");</script>";
         }
     }
     $html .= '<script>insertLineFootor(\'lineItems\');</script>';
 }
 else if($view == 'DetailView'){
 }
 return $html;
}
