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
    ),
    'advanced_search' => 
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
      'serial_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_number',
      ),
      /*'asset_criticality' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_ASSET_CRITICALITY',
        'width' => '10%',
        'default' => true,
        'name' => 'asset_criticality',
      ),*/
      'owning_details' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_OWNING_DETAILS',
        'width' => '10%',
        'default' => true,
        'name' => 'owning_details',
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
      'asset_group' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_GROUP',
        'displayParams' => 
            array (
              'initial_filter' => '&type_advanced=Good&is_asset_group_c_advanced=1',
            ),
        'id' => 'AOS_PRODUCTS_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'asset_group',
      ),
      'asset_category' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_CATEGORY',
        'id' => 'AOS_PRODUCT_CATEGORIES_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'asset_category',
      ),
      'parent_asset' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PARENT_ASSET',
        'id' => 'PARENT_ASSET_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'parent_asset',
      ),
      'hat_asset_locations_hat_assets_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_LOCATION',
        'width' => '10%',
        'default' => true,
        'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
        'name' => 'hat_asset_locations_hat_assets_name',
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
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'field' => '30',
    ),
  ),
);
?>
