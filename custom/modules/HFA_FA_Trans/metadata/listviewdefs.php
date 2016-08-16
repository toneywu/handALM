<?php
$module_name = 'HFA_FA_Trans';
$listViewDefs [$module_name] = 
array (
  'HFA_FIXED_ASSETS_HFA_FA_TRANS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_TRANS_FROM_HFA_FIXED_ASSETS_TITLE',
    'id' => 'HFA_FIXED_B669_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'FA_TRANS_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FA_TRANS_TYPE',
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
  'TRANS_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TRANS_DATE',
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
  'RELATED_ASSET_TRANS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_RELATED_ASSET_TRANS',
    'id' => '',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
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
