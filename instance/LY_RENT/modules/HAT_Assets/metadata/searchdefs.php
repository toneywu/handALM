<?php
$module_name = 'HAT_Assets';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'asset_desc' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ASSET_DESC',
        'width' => '10%',
        'default' => true,
        'name' => 'asset_desc',
      ),
      'asset_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ASSET_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'asset_number',
      ),
      /*'serial_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_number',
      ),*/
      'vin' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_VIN',
        'width' => '10%',
        'default' => true,
        'name' => 'vin',
      ),
      'hat_asset_locations_hat_assets_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_LOCATION',
        'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'hat_asset_locations_hat_assets_name',
      ),
      'location_desc' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LOCATION_DESC',
        'width' => '10%',
        'default' => true,
        'name' => 'location_desc',
      ),
      /*'hat_assets_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'hat_assets_accounts_name',
      ),*/
      'hat_assets_contacts_name' => 
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
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
