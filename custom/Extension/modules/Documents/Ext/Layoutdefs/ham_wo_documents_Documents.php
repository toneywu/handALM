<?php
 // created: 2016-12-30 23:34:15
$layout_defs["Documents"]["subpanel_setup"]['ham_wo_documents'] = array (
  'order' => 100,
  'module' => 'HAM_WO',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAM_WO_DOCUMENTS_FROM_HAM_WO_TITLE',
  'get_subpanel_data' => 'ham_wo_documents',
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
