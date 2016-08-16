<?php
$module_name = 'HAT_Asset_Trans';
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
      'hat_assets_hat_asset_trans_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE',
        'id' => 'HAT_ASSETS_HAT_ASSET_TRANSHAT_ASSETS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'hat_assets_hat_asset_trans_name',
      ),
      'trans_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_TRANS_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'trans_status',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
