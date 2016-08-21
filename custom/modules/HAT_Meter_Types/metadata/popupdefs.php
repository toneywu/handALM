<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Meter_Types',
    'varName' => 'HAT_Meter_Types',
    'orderBy' => 'hat_meter_types.name',
    'whereClauses' => array (
  'name' => 'hat_meter_types.name',
  'domain' => 'hat_meter_types.domain',
),
    'searchInputs' => array (
  1 => 'name',
  2 => 'domain',
),
    'searchdefs' => array (
  'domain' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_DOMAIN',
    'id' => 'HAA_FRAMEWORKS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'domain',
  ),
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
),
);
