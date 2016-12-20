<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Assets',
    'varName' => 'HAT_Assets',
    'orderBy' => 'hat_assets.name',
    'whereClauses' => array (
  'name' => 'hat_assets.name',
  'asset_desc' => 'hat_assets.asset_desc',
  'serial_number' => 'hat_assets.serial_number',
  'hat_asset_locations_hat_assets_name' => 'hat_assets.hat_asset_locations_hat_assets_name',
  'hat_assets_accounts_name' => 'hat_assets.hat_assets_accounts_name',
  'owning_org' => 'hat_assets.owning_org',
  'framework' => 'hat_assets.framework',
  'asset_group' => 'hat_assets.asset_group',
  'asset_type' => 'hat_assets.asset_type',
),
    'searchInputs' => array (
  1 => 'name',
  2 => 'asset_desc',
  3 => 'serial_number',
  4 => 'hat_asset_locations_hat_assets_name',
  5 => 'hat_assets_accounts_name',
  6 => 'owning_org',
  7 => 'framework',
  10 => 'asset_type',
  11 => 'asset_group',
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
  'asset_group' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_GROUP',
    'id' => 'AOS_PRODUCTS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'asset_group',
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
  'owning_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWING_ORG',
    'id' => 'OWNING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'owning_org',
  ),
  'asset_type' => 
  array (
    'type' => 'varchar',
    'label' => '',
    'width' => '10%',
    'name' => 'asset_type',
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
