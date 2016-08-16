<?php
$popupMeta = array (
    'moduleMain' => 'HAM_Maint_Sites',
    'varName' => 'HAM_Maint_Sites',
    'orderBy' => 'ham_maint_sites.name',
    'whereClauses' => array (
  'name' => 'ham_maint_sites.name',
  'title' => 'ham_maint_sites.title',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'title',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'title' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'name' => 'title',
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
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
),
);
