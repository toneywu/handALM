<?php
// created: 2016-07-23 13:37:18
$subpanel_layout['list_fields'] = array (
  'hfa_fixed_assets_hfa_fa_value_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_ASSETS_HFA_FA_VALUEHFA_FIXED_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HFA_Fixed_Assets',
    'target_record_key' => 'hfa_fixed_assets_hfa_fa_valuehfa_fixed_assets_ida',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'period_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PERIOD_NAME',
    'id' => 'HFA_PERIODS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HFA_Periods',
    'target_record_key' => 'hfa_periods_id',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'value_changed' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_VALUE_CHANGED',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HFA_FA_Value',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HFA_FA_Value',
    'width' => '5%',
    'default' => true,
  ),
);