<?php
$module_name = 'HAT_Assets';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSET_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '20%',
    'default' => true,
  ),
  'ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_STATUS',
    'width' => '10%',
  ),
  'ASSET_CRITICALITY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_CRITICALITY',
    'width' => '10%',
    'default' => true,
  ),
  'HAT_ASSET_LOCATIONS_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSET_LOCATIONS_TITLE',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'HAT_ASSETS_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'HAT_ASSETS_CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'HAT_ASSETS_CONTACTSCONTACTS_IDA',
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
  'LOCATION_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION_DESC',
    'width' => '10%',
    'default' => false,
  ),
  'ASSET_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'SERIAL_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'TRACKING_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRACKING_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'MAINTAINABLE' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_MAINTAINABLE',
    'width' => '10%',
  ),
  'ENGINE_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ENGINE_NUM',
    'width' => '10%',
    'default' => false,
  ),
  'VIN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VIN',
    'width' => '10%',
    'default' => false,
  ),
);
?>
