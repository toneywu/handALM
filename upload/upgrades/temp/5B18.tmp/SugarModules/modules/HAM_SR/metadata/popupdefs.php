<?php
$popupMeta = array (
    'moduleMain' => 'HAM_SR',
    'varName' => 'HAM_SR',
    'orderBy' => 'ham_sr.name',
    'whereClauses' => array (
  'name' => 'ham_sr.name',
  'sr_number' => 'ham_sr.sr_number',
  'reporter' => 'ham_sr.reporter',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'sr_number',
  5 => 'reporter',
),
    'searchdefs' => array (
  'sr_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SR_NUMBER',
    'width' => '10%',
    'name' => 'sr_number',
  ),
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'reporter' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_REPORTER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'reporter',
  ),
),
    'listviewdefs' => array (
  'SR_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SR_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'HAM_SR_FP_EVENT_LOCATIONS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
    'id' => 'HAM_SR_FP_EVENT_LOCATIONSFP_EVENT_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'HAM_SR_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
    'id' => 'HAM_SR_HAT_ASSETSHAT_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'REPORTER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_REPORTER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'REPORTED_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_REPORTED_DATE',
    'width' => '10%',
    'default' => true,
  ),
),
);
