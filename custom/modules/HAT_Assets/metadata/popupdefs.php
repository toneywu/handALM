<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Assets',
    'varName' => 'HAT_Assets',
    'orderBy' => 'hat_assets.name',
    'whereClauses' => array (
  'name' => 'hat_assets.name',
  'asset_desc' => 'hat_assets.asset_desc',
  'serial_number' => 'hat_assets.serial_number',
  'vin' => 'hat_assets.vin',
  'hat_asset_locations_hat_assets_name' => 'hat_assets.hat_asset_locations_hat_assets_name',
  'hat_assets_accounts_name' => 'hat_assets.hat_assets_accounts_name',
  'hat_assets_contacts_name' => 'hat_assets.hat_assets_contacts_name',
  'tracking_number' => 'hat_assets.tracking_number',
  'framework' => 'hat_assets.framework',
  'owning_org_id' => 'hat_assets.owning_org_id',
  'enable_it_rack'=>'hat_assets.enable_it_rack',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'asset_desc',
  5 => 'serial_number',
  6 => 'vin',
  7 => 'hat_asset_locations_hat_assets_name',
  8 => 'hat_assets_accounts_name',
  9 => 'hat_assets_contacts_name',
  10 => 'tracking_number',
  11 => 'framework',
  12=>'owning_org_id',
  13=>'enable_it_rack',
),
    'searchdefs' => array (
  'framework' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORK',
    'id' => 'HAA_FRAMEWORKS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'framework',
  ),
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'asset_desc' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'name' => 'asset_desc',
  ),
  'serial_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NUMBER',
    'width' => '10%',
    'name' => 'serial_number',
  ),
  'vin' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VIN',
    'width' => '10%',
    'name' => 'vin',
  ),
  'hat_asset_locations_hat_assets_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'name' => 'hat_asset_locations_hat_assets_name',
  ),
  'hat_assets_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'hat_assets_accounts_name',
  ),
  'hat_assets_contacts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'HAT_ASSETS_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'name' => 'hat_assets_contacts_name',
  ),
  'tracking_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRACKING_NUMBER',
    'width' => '10%',
    'name' => 'tracking_number',
  ),
  'owning_org_id' => 
  array (
    'type' => 'varchar',
    'label' => '',
    'width' => '10%',
    'default' => true,
    'name' => 'owning_org_id',
  ),
  'enable_it_rack' => 
  array (
    'type' => 'varchar',
    'label' => '',
    'width' => '10%',
    'default' => true,
    'name' => 'enable_it_rack',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'name',
  ),
  'ASSET_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'default' => true,
    'name' => 'asset_desc',
  ),
  'HAT_ASSET_LOCATIONS_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_asset_locations_hat_assets_name',
  ),
  'HAT_ASSETS_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_assets_accounts_name',
  ),
  'HAT_ASSETS_CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'HAT_ASSETS_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_assets_contacts_name',
  ),
  
),
);
