<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Counting_Batchs'] = array(
    // list of what Subpanels to show in the DetailView
  /*'subpanel_setup' => array(
    'hat_counting_tasks' => array(
      'order' => 10,
      'module' => 'HAT_Counting_Tasks',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'subpanel_name' => 'HAT_Counting_Batch_Subpanels_Tasks',
      'get_subpanel_data' => 'hat_counting_task_link',
      'title_key' => 'LBL_HAT_COUNTING_BATCH_SUBPANELS_TASKS',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),
      ),*/
/*    'subpanel_setup' => array(
    'haos_insurance_claims' => array(
      'order' => 30,
      'module' => 'HAOS_Insurance_Claims',
      'sort_order' => 'asc',
      'sort_by' => 'claim_number',
      'subpanel_name' => 'HAOS_Insurances_subpanel_haos_insurance_claims',
      'get_subpanel_data' => 'function:get_insurance_claims',//这里没有指向传统的link，而是指向了一个function
      'generate_select' => true,
      'title_key' => 'LBL_HAOS_INSURANCE_CLAIMS_SUBPANEL_TITLE',
      'top_buttons'  => array (),
      'function_parameters' => array(
        'import_function_file' => 'modules/HAOS_Insurance_Claims/Insurance_ClaimsSubpanel.php',//指向特定的文件
        'insurance_id' => $this->_focus->id,
        'return_as_array' => 'true'
      ),
      ),*/
      'subpanel_setup' => array(
        'hat_counting_tasks' => array(
          'order' => 10,
          'module' => 'HAT_Counting_Tasks',
          'sort_order' => 'asc',
          'sort_by' => 'id',
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