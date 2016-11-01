<?php
$module_name = 'HIT_ODF_REL';
$listViewDefs [$module_name] = 
array (
  'JUMP_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_JUMP_NUMBER',
    'width' => '10%',
    'default' => true,
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
  'A_HIT_RACKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_HIT_RACKS',
    'id' => 'A_HIT_RACKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'A_HAT_ASSET_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_A_HAT_ASSET_LOCATIONS',
    'id' => 'A_HAT_ASSET_LOCATION_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'A_ODF_MARK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_A_ODF_MARK',
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
    'default' => true,
  ),
  'B_HIT_RACKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_B_HIT_RACKS',
    'id' => 'B_HIT_RACKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'B_ODF_MARK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_B_ODF_MARK',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
?>
