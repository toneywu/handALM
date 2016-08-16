<?php
$module_name = 'HAM_SR';
$listViewDefs [$module_name] = 
array (
  'SR_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SR_NUMBER',
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
    'width' => '10%',
    'default' => true,
  ),
  'HAM_SR_FP_EVENT_LOCATIONS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
    'id' => 'HAM_SR_FP_EVENT_LOCATIONSFP_EVENT_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'HAM_SR_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
    'id' => 'HAM_SR_HAT_ASSETSHAT_ASSETS_IDA',
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
