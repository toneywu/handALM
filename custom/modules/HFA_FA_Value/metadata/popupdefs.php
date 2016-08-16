<?php
$popupMeta = array (
    'moduleMain' => 'HFA_FA_Value',
    'varName' => 'HFA_FA_Value',
    'orderBy' => 'hfa_fa_value.name',
    'whereClauses' => array (
  'name' => 'hfa_fa_value.name',
  'hfa_fixed_assets_hfa_fa_value_name' => 'hfa_fa_value.hfa_fixed_assets_hfa_fa_value_name',
  'period_name' => 'hfa_fa_value.period_name',
  'type' => 'hfa_fa_value.type',
  'value_changed' => 'hfa_fa_value.value_changed',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'hfa_fixed_assets_hfa_fa_value_name',
  5 => 'period_name',
  6 => 'type',
  7 => 'value_changed',
),
    'searchdefs' => array (
  'hfa_fixed_assets_hfa_fa_value_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_ASSETS_HFA_FA_VALUEHFA_FIXED_ASSETS_IDA',
    'width' => '10%',
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
    'name' => 'period_name',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
  'value_changed' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_VALUE_CHANGED',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'value_changed',
  ),
),
);
