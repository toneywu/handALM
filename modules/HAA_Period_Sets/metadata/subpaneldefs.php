<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAA_Period_Sets'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'haa_periods' => array(
      'order' => 30,
      'module' => 'HAA_Periods',
      'sort_order' => 'asc',
      'sort_by' => 'sort_order',
      'subpanel_name' => 'default',
      'get_subpanel_data' => 'function:get_haa_periods',//这里没有指向传统的link，而是指向了一个function
      'generate_select' => true,
      'title_key' => 'LBL_EDITVIEW_PANELSS1',
      //'top_buttons'  => array (),
      'function_parameters' => array(
                      'import_function_file' => 'modules/HAA_Periods/HAA_PeriodsSubpanel.php',//指向特定的文件
                      'header_id' => $this->_focus->id,
                      'return_as_array' => 'true',
                      ),
      ), 
    ),
  );
  ?>