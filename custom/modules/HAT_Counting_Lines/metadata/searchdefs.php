<?php
$module_name = 'HAT_Counting_Lines';
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
      'product' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_PRODUCT',
        'id' => 'AOS_PRODUCTS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'product',
      ),
      'asset' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ASSET',
        'id' => 'HAT_ASSETS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'asset',
      ),
      'snapshot_quantity' => 
      array (
        'type' => 'int',
        'label' => 'LBL_SNAPSHOT_QUANTITY',
        'width' => '10%',
        'default' => true,
        'name' => 'snapshot_quantity',
      ),
      'oranization' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ORANIZATION',
        'id' => 'ACCOUNT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'oranization',
      ),
      'part_number' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PART_NUMBER',
        'width' => '10%',
        'name' => 'part_number',
      ),
      'asset_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_ASSET_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'asset_status',
      ),
      'asset_location' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ASSET_LOCATION',
        'id' => 'HAT_ASSET_LOCATIONS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'asset_location',
      ),
      'asset_desc' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_DESC',
        'width' => '10%',
        'name' => 'asset_desc',
      ),
      'counting_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_COUNTING_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'counting_status',
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
