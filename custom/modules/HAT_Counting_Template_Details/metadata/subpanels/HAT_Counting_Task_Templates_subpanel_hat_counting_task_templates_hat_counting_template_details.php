<?php
// created: 2017-01-25 11:17:31
$subpanel_layout['list_fields'] = array (
  'sort_order' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_SORT_ORDER',
    'width' => '10%',
    'default' => true,
  ),
  'field_lable' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_FIELD_LABLE',
    'width' => '10%',
    'default' => true,
  ),
  'table_names' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_TABLE_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'column_name' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COLUMN_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'field_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_FIELD_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'relate_module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_RELATE_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'list_name' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_LIST_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'can_edit_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_CAN_EDIT_FLAG',
    'width' => '10%',
  ),
  'required_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_REQUIRED_FLAG',
    'width' => '10%',
  ),
  'enabled_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Template_Details',
    'width' => '5%',
    'default' => true,
  ),
);