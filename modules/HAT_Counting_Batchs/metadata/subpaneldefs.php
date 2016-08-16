<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Counting_Batchs'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(
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
      ),   
    );
    ?>