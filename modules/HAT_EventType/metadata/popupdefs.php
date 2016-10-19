<?php
$popupMeta = array (
    'moduleMain' => 'HAT_EventType',
    'varName' => 'HAT_EventType',
    'orderBy' => 'hat_eventtype.name',
    'whereClauses' => array (
  'name' => 'hat_eventtype.name',
),
    'searchInputs' => array (
  1 => 'name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'EVENT_SHORT_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_SHORT_DESC',
    'width' => '10%',
    'default' => true,
    'name' => 'event_short_desc',
  ),
/*  'BASIC_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BASIC_TYPE',
    'width' => '32%',
    'name' => 'basic_type',
  ),*/
),
);
