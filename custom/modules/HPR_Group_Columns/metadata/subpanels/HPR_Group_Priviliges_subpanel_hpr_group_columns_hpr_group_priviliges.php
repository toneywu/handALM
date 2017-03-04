<?php
// created: 2017-02-28 22:15:47
$subpanel_layout['list_fields'] = array (
  'sort_number' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_SORT_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'hpr_column_name' => 
  array (
    'type' => 'dynamicenum',
    'studio' => 'visible',
    'vname' => 'LBL_HPR_COLUMN_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'edit_enable_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_EDIT_ENABLE_FLAG',
    'width' => '10%',
  ),
  'hide_enable_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_HIDE_ENABLE_FLAG',
    'width' => '10%',
  ),
  'remove_button' => 
  array (
    'width' => '5%',
    'vname' => 'LBL_REMOVE',
    'default' => true,
    'widget_class' => 'SubPanelRemoveButton',
  ),
);