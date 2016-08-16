<?php
$module_name = 'HFA_FA_Value';
$listViewDefs [$module_name] = 
array (
  'HFA_FIXED_ASSETS_HFA_FA_VALUE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_ASSETS_HFA_FA_VALUEHFA_FIXED_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'PERIOD_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PERIOD_NAME',
    'id' => 'HFA_PERIODS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'VALUE_CHANGED' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_VALUE_CHANGED',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
