<?php
$module_name = 'HAT_Asset_Locations';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'LOCATION_TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION_TITLE',
    'width' => '35%',
    'default' => true,
  ),
  'ASSET_NODE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ASSET_NODE',
    'width' => '10%',
  ),
  'MAINT_NODE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_MAINT_NODE',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
