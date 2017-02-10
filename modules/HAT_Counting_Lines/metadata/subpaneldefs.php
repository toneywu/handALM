<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Counting_Lines'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    /*'hat_counting_lines_hat_counting_results' => array(
      'order' => 10,
      'module' => 'HAT_Counting_Results',
      'sort_order' => 'asc',
      'sort_by' => 'cycle_number',
      'subpanel_name' => 'default',
      'title_key' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_RESULTS_TITLE',
      'get_subpanel_data' => 'hat_counting_lines_hat_counting_results',
      'top_buttons' => 
      array (),
      ), */ 
    'hat_counting_lines_documents'=> array (
      'order' => 20,
      'module' => 'Documents',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_HAT_COUNTING_LINES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
      'get_subpanel_data' => 'hat_counting_lines_documents',
      'top_buttons' => 
      array (),
      ),
    ),   
  );
  ?>