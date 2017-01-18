<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Counting_Tasks'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'hat_counting_lines' => array(
      'order' => 10,
      'module' => 'HAT_Counting_Lines',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'subpanel_name' => 'HAT_Counting_Tasks_subpanel_hat_counting_lines',
      'get_subpanel_data' => 'function:get_counting_lines',
      'title_key' => 'LBL_HAT_COUNTING_TASK_SUBPANELS_LINES',
      'generate_select' => true,
      'function_parameters' => array(
        'import_function_file' => 'modules/HAT_Counting_Lines/LinesSubpanel.php',
        'task_id' => $this->_focus->id,
        'return_as_array' => 'true',
        ),
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),  
    ),   
  );
  ?>