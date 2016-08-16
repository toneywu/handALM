<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Domains',
    'varName' => 'HAT_Domains',
    'orderBy' => 'hat_domains.name',
    'whereClauses' => array (
  'name' => 'hat_domains.name',
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
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '33%',
    'default' => true,
    'name' => 'description',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_modified',
  ),
),
);
