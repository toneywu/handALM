<?php
$module_name = 'HAT_EventManeger';
$listViewDefs [$module_name] = 
array (
  'EVENT_NUMBER' => 
  array (
    'label' => 'LBL_EVENT_NUMBER',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'id' => 'HAT_EVENTTYPE_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_SUBTYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_SUBTYPE',
    'id' => 'HAT_EVENTTYPE_ID1_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSET_NUMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_NUMBER',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_OBJECT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_OBJECT',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_RESP_PARTY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_RESP_PARTY',
    'width' => '10%',
    'default' => true,
  ),
  'PERSON_NUMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PERSON_NUMBER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_EVENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_LOCATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'TREATMENT_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TREATMENT_STATUS',
    'width' => '10%',
    'default' => true,
  ),
);
?>
