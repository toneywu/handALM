<?php
$module_name = 'HIT_ODF_REL';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ODF_USER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ODF_USER',
    'width' => '10%',
    'default' => true,
  ),
  'ODF_USER_CONTENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ODF_USER_CONTENT',
    'width' => '10%',
    'default' => true,
  ),
  'A_HIT_RACKS_DIS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_A_HIT_RACKS',
    'width' => '10%',
    'default' => true,
  ),
  'A_HAT_ASSET_LOCATIONS_DIS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_A_HAT_ASSET_LOCATIONS',
    'width' => '10%',
    'default' => true,
  ),
  'A_ODF_MARK_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_ODF_MARK_NAME',
    'id' => 'A_ODF_MARK',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'B_HAT_ASSET_LOCATIONS_DIS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_B_HAT_ASSET_LOCATIONS',
    'width' => '10%',
    'default' => true,
  ),
  'B_HIT_RACKS_DIS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_B_HIT_RACKS',
    'width' => '10%',
    'default' => true,
  ),
  'B_ODF_MARK_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_B_ODF_MARK_NAME',
    'id' => 'B_ODF_MARK',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'B_HAT_ASSET_LOCATIONS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_B_HAT_ASSET_LOCATIONS',
    'id' => 'B_HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'B_HIT_RACKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_B_HIT_RACKS',
    'id' => 'B_HIT_RACKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'A_HAT_ASSET_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_HAT_ASSET_LOCATIONS',
    'id' => 'A_HAT_ASSET_LOCATION_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'A_HIT_RACKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_HIT_RACKS',
    'id' => 'A_HIT_RACKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'A_ODF_MARK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_A_ODF_MARK',
    'width' => '10%',
    'default' => false,
  ),
  'JUMP_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_JUMP_NUMBER',
    'width' => '10%',
    'default' => false,
  ),
  'B_ODF_MARK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_B_ODF_MARK',
    'width' => '10%',
    'default' => false,
  ),
  'A_HAT_ASSET_LOCATIONS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_HAT_ASSET_LOCATIONS',
    'id' => 'A_HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
