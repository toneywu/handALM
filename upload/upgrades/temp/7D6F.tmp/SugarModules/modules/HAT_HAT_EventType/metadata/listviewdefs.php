<?php
$module_name = 'HAT_HAT_EventType';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'BASIC_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BASIC_TYPE',
    'width' => '10%',
  ),
  'CHANGE_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_STATUS',
    'width' => '10%',
  ),
  'TARGET_ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_ASSET_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'PROCESSING_ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PROCESSING_ASSET_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'CHANGE_ORGANIZATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_ORGANIZATION',
    'width' => '10%',
  ),
  'CHANGE_ORANIZATION_LE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_ORANIZATION_LE',
    'width' => '10%',
  ),
  'CHANGE_CONTACT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_CONTACT',
    'width' => '10%',
  ),
  'CHANGE_LOCATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_LOCATION',
    'width' => '10%',
  ),
  'CHANGE_LOCATION_DESC' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_LOCATION_DESC',
    'width' => '10%',
  ),
  'REQUIRE_APPROVAL_WORKFLOW' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REQUIRE_APPROVAL_WORKFLOW',
    'width' => '10%',
  ),
  'REQUIRE_CONFIRMATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REQUIRE_CONFIRMATION',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
);
?>
