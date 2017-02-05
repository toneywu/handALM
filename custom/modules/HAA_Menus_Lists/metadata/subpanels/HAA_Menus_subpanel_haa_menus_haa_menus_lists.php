<?php
// created: 2017-02-05 19:37:37
$subpanel_layout['list_fields'] = array (
  'sort_order' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_SORT_ORDER',
    'width' => '10%',
    'default' => true,
  ),
  'field_lable_zhs' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_FIELD_LABLE_ZHS',
    'width' => '10%',
    'default' => true,
  ),
  'func_module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_FUNC_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'function_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_FUNCTION_NAME',
    'id' => 'FUNCTION_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Functions',
    'target_record_key' => 'function_id',
  ),
  'func_icon' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_FUNC_ICON',
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
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAA_Menus_Lists',
    'width' => '5%',
    'default' => true,
  ),
);