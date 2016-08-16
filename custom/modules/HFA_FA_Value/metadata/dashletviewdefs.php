<?php
$dashletData['HFA_FA_ValueDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['HFA_FA_ValueDashlet']['columns'] = array (
  'hfa_fixed_assets_hfa_fa_value_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_ASSETS_HFA_FA_VALUEHFA_FIXED_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hfa_fixed_assets_hfa_fa_value_name',
  ),
  'period_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PERIOD_NAME',
    'id' => 'HFA_PERIODS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'period_name',
  ),
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'type',
  ),
  'value_changed' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_VALUE_CHANGED',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'value_changed',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
