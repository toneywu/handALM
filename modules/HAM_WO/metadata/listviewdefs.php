<?php
$module_name = 'HAM_WO';
$listViewDefs [$module_name] = 
array (
  'WO_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_NUMBER',
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
  'WO_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_WO_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_SCHEDUALED_START' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_SCHEDUALED_FINISH' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
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
