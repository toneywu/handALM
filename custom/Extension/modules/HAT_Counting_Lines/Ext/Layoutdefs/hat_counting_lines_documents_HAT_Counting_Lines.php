<?php
 // created: 2016-12-21 10:11:54
$layout_defs["HAT_Counting_Lines"]["subpanel_setup"]['hat_counting_lines_documents'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_COUNTING_LINES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
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
