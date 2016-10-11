<?php
$popupMeta = array (
    'moduleMain' => 'HAM_WO',
    'varName' => 'HAM_WO',
    'orderBy' => 'ham_wo.name',
    'whereClauses' => array (
  'name' => 'ham_wo.name',
  'wo_number' => 'ham_wo.wo_number',
  'site' => 'ham_wo.site',
  'work_center' => 'ham_wo.work_center',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'wo_number',
  5 => 'site',
  6 => 'work_center',
),
    'searchdefs' => array (
  'wo_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_NUMBER',
    'width' => '10%',
    'name' => 'wo_number',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'site' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'site',
  ),
  'work_center' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WORK_CENTER',
    'id' => 'WORK_CENTER_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'work_center',
  ),
),
);
