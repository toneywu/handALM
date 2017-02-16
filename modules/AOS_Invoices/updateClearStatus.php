<?php
 global $db;
 $sql = 'update haos_revenues_quotes
							set clear_status="Unclear"
							where aos_invoices_id_c="'.$_REQUEST['invoiceId'].'"';
 echo $db->query($sql);
?>