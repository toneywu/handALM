<?php
$module_name = 'HAT_EventType';
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
  'PARENT_EVENTTYPE' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PARENT_EVENTTYPE',
    'id' => 'PARENT_EVENTTYPE_ID',
    'link' => true,
    'width' => '10%',
  ),
  'HAA_FF' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HAA_FF',
    'id' => 'HAA_FF_ID',
    'link' => true,
    'width' => '10%',
  ),
  'EVENT_SHORT_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_SHORT_DESC',
    'width' => '10%',
    'default' => true,
  ),
  'CHANGE_TARGET_STATUS' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_CHANGE_TARGET_STATUS',
    'width' => '10%',
  ),
  'TARGET_ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_ASSET_STATUS',
    'width' => '10%',
    'default' => false,
  ),
  'CHANGE_PROCESSING_STATUS' => 
  array (
    'type' => 'bool',
    'default' => false,
    'label' => 'LBL_CHANGE_PROCESSING_STATUS',
    'width' => '10%',
  ),
  'CHANGE_ORANIZATION_LE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_ORANIZATION_LE',
    'width' => '10%',
  ),
  'PROCESSING_ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PROCESSING_ASSET_STATUS',
    'width' => '10%',
    'default' => false,
  ),
  'CHANGE_CONTACT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_CONTACT',
    'width' => '10%',
  ),
  'REQUIRE_APPROVAL_WORKFLOW' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_REQUIRE_APPROVAL_WORKFLOW',
    'width' => '10%',
  ),
  'REQUIRE_CONFIRMATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_REQUIRE_CONFIRMATION',
    'width' => '10%',
  ),
  'CHANGE_LOCATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_LOCATION',
    'width' => '10%',
  ),
  'CHANGE_LOCATION_DESC' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_LOCATION_DESC',
    'width' => '10%',
  ),
  'CHANGE_ORGANIZATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CHANGE_ORGANIZATION',
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
