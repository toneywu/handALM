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
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_STATUS',
    'width' => '15%',
    'customCode'=>'<span class="color_tag color_asset_status_{$ASSET_STATUS_VAL}">{$ASSET_STATUS}</span>'
  ),
  'ASSET_CATEGORY' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_CATEGORY',
    'id' => 'AOS_PRODUCT_CATEGORIES_ID',
    'link' => true,
    'width' => '10%',
  ),
  'OWNING_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWING_ORG',
    'id' => 'OWNING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  /*'ASSET_CRITICALITY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_CRITICALITY',
    'width' => '10%',
    'default' => true,
  ),*/
  'HAT_ASSET_LOCATIONS_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'USING_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_USING_ORG',
    'id' => 'USING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'USING_PERSON' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_USING_PERSON',
    'id' => 'USING_PERSON_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  
  'OWNING_PERSON' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWNING_PERSON',
    'id' => 'OWNING_PERSON_ID',
    'link' => true,
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
  'LOCATION_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION_DESC',
    'width' => '10%',
    'default' => false,
  ),
);
?>
