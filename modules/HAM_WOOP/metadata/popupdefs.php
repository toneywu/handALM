<?php
$popupMeta = array (
    'moduleMain' => 'HAM_WOOP',
    'varName' => 'HAM_WOOP',
    'orderBy' => 'ham_woop.name',
    'whereClauses' => array (
  'name' => 'ham_woop.name',
  'work_center' => 'ham_woop.work_center',
  'work_center_people' => 'ham_woop.work_center_people',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'work_center',
  5 => 'work_center_people',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'work_center' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WORK_CENTER',
    'id' => 'HAM_WORK_CENTER_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'work_center',
  ),
  'work_center_people' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAM_WORK_CENTER_PEOPLE',
    'id' => 'WORK_CENTER_PEOPLE_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'work_center_people',
  ),
),
    'listviewdefs' => array (
  'WOOP_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WOOP_NUMBER',
    'width' => '5%',
    'default' => true,
    'name' => 'woop_number',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'WO_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_NUMBER',
    'width' => '25%',
    'default' => true,
    'name' => 'wo_number',
  ),
  'WORK_CENTER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WORK_CENTER',
    'id' => 'HAM_WORK_CENTER_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'work_center',
  ),
  'WORK_CENTER_RES' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WORK_CENTER_RES',
    'id' => 'WORK_CENTER_RES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'work_center_res',
  ),
  'WORK_CENTER_PEOPLE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAM_WORK_CENTER_PEOPLE',
    'id' => 'WORK_CENTER_PEOPLE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'work_center_people',
  ),
  'WOOP_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_WOOP_STATUS',
    'width' => '10%',
    'default' => true,
    'name' => 'woop_status',
  ),
  'DATE_SCHEDUALED_FINISH' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'date_schedualed_finish',
  ),
),
);
