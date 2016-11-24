<?php
 // created: 2016-11-22 18:14:18
$layout_defs["HAOS_Insurances"]["subpanel_setup"]['haos_insurances_documents'] = array (
  'order' => 100,
  'module' => 'Documents',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAOS_INSURANCES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
  'get_subpanel_data' => 'haos_insurances_documents',
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
