<?php
$module_name = 'HAT_Asset_Locations';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'maint_site' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MAINT_SITE',
        'id' => 'HAM_MAINT_SITES_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'maint_site',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'code_asset_location_type' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_LOCATION_TYPE',
        'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=asset_location_type',
              ),
        'id' => 'CODE_ASSET_LOCATION_TYPE_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'code_asset_location_type',
      ),
    ),
    'advanced_search' => 
    array (
      'maint_site' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MAINT_SITE',
        'link' => true,
        'width' => '10%',
        'id' => 'HAM_MAINT_SITES_ID',
        'name' => 'maint_site',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'location_title' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LOCATION_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'location_title',
      ),
      'code_asset_location_type' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_LOCATION_TYPE',
        'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=asset_location_type',
              ),
        'id' => 'CODE_ASSET_LOCATION_TYPE_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'code_asset_location_type',
      ),
      /*'maint_node' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_MAINT_NODE',
        'width' => '10%',
        'name' => 'maint_node',
      ),
      'map_enabled' => 
      array (
        'type' => 'bool',
        'label' => 'LBL_MAP_ENABLED',
        'width' => '10%',
        'default' => true,
        'name' => 'map_enabled',
      ),
      'asset_node' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ASSET_NODE',
        'width' => '10%',
        'name' => 'asset_node',
      ),
      'map_address' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MAP_ADDRESS',
        'width' => '10%',
        'default' => true,
        'name' => 'map_address',
      ),
      'inventory_mode' => 
      array (
        'default' => true,
        'type' => 'enum',
        'label' => 'LBL_INVENTORY_MODE',
        'width' => '10%',
        'name' => 'inventory_mode',
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
