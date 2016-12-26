<?php
 // created: 2016-12-24 15:08:39
$layout_defs["Documents"]["subpanel_setup"]['hat_counting_lines_documents'] = array (
  'order' => 100,
  'module' => 'HAT_Counting_Lines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_LINES_DOCUMENTS_FROM_HAT_COUNTING_LINES_TITLE',
  'get_subpanel_data' => 'hat_counting_lines_documents',
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
