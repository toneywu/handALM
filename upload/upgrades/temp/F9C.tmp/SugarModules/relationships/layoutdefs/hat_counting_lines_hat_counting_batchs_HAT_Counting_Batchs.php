<?php
 // created: 2016-03-25 14:06:50
$layout_defs["HAT_Counting_Batchs"]["subpanel_setup"]['hat_counting_lines_hat_counting_batchs'] = array (
  'order' => 100,
  'module' => 'HAT_Counting_Lines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_BATCHS_FROM_HAT_COUNTING_LINES_TITLE',
  'get_subpanel_data' => 'hat_counting_lines_hat_counting_batchs',
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
