<?php
 // created: 2016-12-21 10:11:54
$layout_defs["HAT_Counting_Lines"]["subpanel_setup"]['hat_counting_lines_hat_counting_results'] = array (
  'order' => 100,
  'module' => 'HAT_Counting_Results',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_RESULTS_TITLE',
  'get_subpanel_data' => 'hat_counting_lines_hat_counting_results',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
