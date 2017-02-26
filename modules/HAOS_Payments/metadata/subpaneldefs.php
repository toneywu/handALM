<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAOS_Payments'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'haa_periods' => array(
      'order' => 30,
      'module' => 'HAOS_Payment_Invoices',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'subpanel_name' => 'default',
      'get_subpanel_data' => 'function:get_haos_payment_invoices',//这里没有指向传统的link，而是指向了一个function
      'generate_select' => true,
      'title_key' => 'LBL_EDITVIEW_SUBPANEL1',
      //'top_buttons'  => array (),
      'function_parameters' => array(
                      'import_function_file' => 'modules/HAOS_Payment_Invoices/HAOS_Payment_InvoicesSubpanel.php',//指向特定的文件
                      'header_id' => $this->_focus->id,
                      'return_as_array' => 'true',
                      ),
      ), 
    ),
  );
  ?>