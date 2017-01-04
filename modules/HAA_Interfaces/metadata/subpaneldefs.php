<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAA_Interfaces'] = array(
  'subpanel_setup' => array(

    'haa_interface_logs' => array(
      'order' => 30,
      'module' => 'HAA_Interface_Logs',
      'sort_order' => 'desc',
      'sort_by' => 'seq',
      'subpanel_name' => 'HAA_Interfaces_subpanel_haa_interface_logs',
            'get_subpanel_data' => 'function:get_haa_interface_logs',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAA_INTERFACE_LOG_SUBPANEL_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAA_Interface_Logs/interfaceLogSubpanel.php',//指向特定的文件
                'interface_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            ),
    ),
  );
  ?>