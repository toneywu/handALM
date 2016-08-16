<?php
// created: 2016-07-23 13:40:45
$subpanel_layout['list_fields'] = array (
  'hfa_fixed_assets_hfa_fa_trans_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_TRANS_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_B669_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HFA_Fixed_Assets',
    'target_record_key' => 'hfa_fixed_b669_assets_ida',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'fa_trans_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_FA_TRANS_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'trans_date' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_TRANS_DATE',
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
  'related_asset_trans' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_RELATED_ASSET_TRANS',
    'id' => '',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Trans',
    'target_record_key' => '',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HFA_FA_Trans',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HFA_FA_Trans',
    'width' => '5%',
    'default' => true,
  ),
);