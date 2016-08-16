<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HIM_Project_Requests'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(
        'him_project_tasks' => array(
            'order' => 10,
           'module' => 'HIM_Project_Tasks',
           'subpanel_name' => 'default',
           'sort_order' => 'asc',
           'sort_by' => 'id',
           'title_key' => 'LBL_HIM_PORJECT_TASKS_SUBPANEL',
           'get_subpanel_data' => 'him_project_tasks_link',
           'top_buttons' => 
           array (
            0 => 
            array (
              'widget_class' => 'SubPanelTopCreateButton',
              ),
            ),
           ),

        'him_project_budgets' => array(
            'order' => 10,
           'module' => 'HIM_Project_Budgets',
           'subpanel_name' => 'him_project_budgets',
           'sort_order' => 'asc',
           'sort_by' => 'id',
           'title_key' => 'LBL_HIM_PROJECT_BUDGETS_SUBPANEL',
           'get_subpanel_data' => 'him_project_budgets_link',
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