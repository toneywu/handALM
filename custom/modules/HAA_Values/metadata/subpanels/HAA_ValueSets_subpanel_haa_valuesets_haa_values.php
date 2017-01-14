<?php
// created: 2017-01-10 15:31:18
$subpanel_layout['list_fields'] = array (
  'flex_value_set' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_FLEX_VALUE_SET',
    'id' => 'HAA_VALUESETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_ValueSets',
    'target_record_key' => 'haa_valuesets_id_c',
  ),
  'parent_flex_value' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PARENT_FLEX_VALUE',
    'id' => 'HAA_VALUES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Values',
    'target_record_key' => 'haa_values_id_c',
  ),
  'flex_value' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_FLEX_VALUE',
    'width' => '10%',
    'default' => true,
  ),
  'flex_meaning' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_FLEX_MEANING',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DESCRIPTION',
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
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAA_Values',
    'width' => '5%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAA_Values',
    'width' => '4%',
    'default' => true,
  ),
);