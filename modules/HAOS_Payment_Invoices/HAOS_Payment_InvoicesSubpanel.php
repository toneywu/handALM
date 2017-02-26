<?php

// function get_haos_payment_invoices($params) {
//   $args = func_get_args();
//   $header_id = $args[0]['header_id'];
//     //$return_array['select'] = " SELECT haos_payment_invoices.*,aos_invoices.name invoice_name,aos_invoices.invoice_date,aos_invoices.due_date invoice_due_date,aos_invoices_cstm.late_days_c invoice_overdue_days,aos_invoices_cstm.unpaied_amount_c invoice_unpaid_amount";
//     $Query = "SELECT hpi.amount,
//     		'sdfsf' description,
//     		ai.number invoice_number,
//     		ai.name invoice_name,
//     		ai.invoice_date,
//     		ai.due_date invoice_due_date,
//     		aic.late_days_c invoice_overdue_days,
//     		aic.unpaied_amount_c invoice_unpaid_amount 
//        FROM haos_payment_invoices hpi,
//             aos_invoices ai,
//             aos_invoices_cstm aic
//             WHERE 1=1 
//             and ai.id=hpi.aos_invoices_id_c and  ai.id=aic.id_c and hpi.haos_payments_id_c='" . $header_id . "'";
//     //console.log($Query);
//     return $Query;
//   }

function get_haos_payment_invoices($params) {
    $args = func_get_args();
	$header_id = $args[0]['header_id'];
    //$return_array['select'] = " SELECT haos_payment_invoices.*,aos_invoices.name invoice_name,aos_invoices.invoice_date,aos_invoices.due_date invoice_due_date,aos_invoices_cstm.late_days_c invoice_overdue_days,aos_invoices_cstm.unpaied_amount_c invoice_unpaid_amount";
    $return_array['select'] = " SELECT haos_payment_invoices.amount,haos_payment_invoices.description,aos_invoices.number invoice_number,aos_invoices.name invoice_name,aos_invoices.invoice_date,aos_invoices.due_date invoice_due_date,aos_invoices_cstm.late_days_c invoice_overdue_days,aos_invoices_cstm.unpaied_amount_c invoice_unpaid_amount ";
    $return_array['from'] = " FROM haos_payment_invoices";
    $return_array['where'] = " WHERE 1=1 and aos_invoices.id=haos_payment_invoices.aos_invoices_id_c and  aos_invoices.id=aos_invoices_cstm.id_c and haos_payment_invoices.haos_payments_id_c='" . $header_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",aos_invoices,aos_invoices_cstm";
    $return_array['join_tables'] = "";
    return $return_array;
}

?>