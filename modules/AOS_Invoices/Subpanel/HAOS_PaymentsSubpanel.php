 <?php

function get_invoice_payments($params) {
    $args = func_get_args();
	$header_id = $args[0]['header_id'];
    $return_array['select'] = " SELECT haos_payments.*";
    $return_array['from'] = " FROM haos_payments";
    $return_array['where'] = " WHERE haos_payments.id in (select haos_payment_invoices.haos_payments_id_c from haos_payment_invoices where 1=1 and haos_payment_invoices.aos_invoices_id_c ='" . $header_id . "')";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

?>