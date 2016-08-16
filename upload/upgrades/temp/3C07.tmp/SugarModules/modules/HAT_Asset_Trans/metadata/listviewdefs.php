<?php
$module_name = 'HAT_Asset_Trans';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'TARGET_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TARGET_LOCATION_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TARGET_LOCATION_DESC',
    'width' => '10%',
    'default' => true,
  ),
  'TARGET_RESPONSIBLE_CENTER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_RESPONSIBLE_CENTER',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TARGET_RESPONSIBLE_PERSON' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_RESPONSIBLE_PERSON',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'CURRENT_RESPONSIBLE_PERSON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENT_RESPONSIBLE_PERSON',
    'width' => '10%',
    'default' => true,
  ),
);
?>
