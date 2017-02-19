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
      'serial_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_number',
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
      'asset_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_STATUS',
        'width' => '10%',
        'name' => 'asset_status',
      ),
      'owning_org' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_OWING_ORG',
        'id' => 'OWNING_ORG_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'owning_org',
      ),
      'using_org' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_USING_ORG',
        'id' => 'USING_ORG_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'using_org',
      ),
      'hat_assets_accounts_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
        'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'hat_assets_accounts_name',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      /*1 => 
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
      ),*/
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
