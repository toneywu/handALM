<?php
// created: 2017-01-17 09:43:26
$subpanel_layout['list_fields'] = array (
  'split_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SPLIT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'data_populate_sql' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DATA_POPULATE_SQL',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'enabled_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Policies',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Policies',
    'width' => '5%',
    'default' => true,
  ),
);