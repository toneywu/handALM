<?php
$module_name = 'HAM_SR';
$listViewDefs [$module_name] = 
array (
  'SR_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SR_NUMBER',
    'width' => '5%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SR_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SR_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID_C',
    'link' => true,
    'width' => '5%',
    'default' => true,
  ),
  'location' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'hat_asset_locations_id',
    'width' => '10%',
    'default' => true,
  ),
  'asset' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ASSET',
    'id' => 'asset',
    'width' => '10%',
    'default' => true,
  ),
  'REPORTER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_REPORTER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'FP_EVENT_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'REPORTED_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_REPORTED_DATE',
    'width' => '10%',
    'default' => true,
  ),
);
?>
