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
  'HAT_ASSET_TRANS_BATCH_HAT_ASSET_TRANS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSET_TRANS_BATCH_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_BATCH_TITLE',
    'id' => 'HAT_ASSET_TRANS_BATCH_HAT_ASSET_TRANSHAT_ASSET_TRANS_BATCH_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'TRANS_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TRANS_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'TARGET_ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_ASSET_STATUS',
    'width' => '10%',
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
    'id' => 'ACCOUNT_ID_C',
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
  'PLANNED_COMPLETE_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_PLANNED_COMPLETE_DATE',
    'width' => '10%',
    'default' => false,
  ),
);
?>
