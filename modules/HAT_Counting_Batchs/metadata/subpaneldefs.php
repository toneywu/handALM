<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Counting_Batchs'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
  'hat_counting_batchs_hat_counting_batch_rules' => array(
    'order' => 10,
    'module' => 'HAT_Counting_Batch_Rules',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'subpanel_name' => 'HAT_Counting_Batchs_subpanel_hat_counting_batchs_hat_counting_batch_rules',
    'get_subpanel_data' => 'hat_counting_batchs_hat_counting_batch_rules',
    'title_key' => 'LBL_HAT_COUNTING_BATCHS_HAT_COUNTING_BATCH_RULES_FROM_HAT_COUNTING_BATCH_RULES_TITLE',
    'top_buttons' => 
    array (
      ),
    ),
   'hat_counting_tasks' => array(
    'order' => 20,
    'module' => 'HAT_Counting_Tasks',
    'sort_order' => 'asc',
    'sort_by' => 'task_number',
    'subpanel_name' => 'default',
    'get_subpanel_data' => 'function:get_counting_tasks',
    'title_key' => 'LBL_HAT_COUNTING_BATCH_SUBPANELS_TASKS',
    'generate_select' => true,
    'function_parameters' => array(
      'import_function_file' => 'modules/HAT_Counting_Tasks/TasksSubpanel.php',
      'batch_id' => $this->_focus->id,
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