<?php
$dashletData['HAM_WOOPDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'woop_status' => 
  array (
    'default' => '',
  ),
  'date_schedualed_start' => 
  array (
    'default' => '',
  ),
  'date_schedualed_finish' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'work_center' => 
  array (
    'default' => '',
  ),
  'work_center_res' => 
  array (
    'default' => '',
  ),
  'work_center_people' => 
  array (
    'default' => '',
  ),
);
$dashletData['HAM_WOOPDashlet']['columns'] = array (
  'wo_number' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WO_NUMBER',
    'id' => 'HAM_WO_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'wo_number',
  ),
  'woop_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WOOP_NUMBER',
    'width' => '10%',
    'default' => true,
    'name' => 'woop_number',
  ),
  'woop_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_WOOP_STATUS',
    'width' => '10%',
    'default' => true,
    'name' => 'woop_status',
  ),
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'work_center' => 
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
  'work_center_res' => 
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
  'work_center_people' => 
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
  'act_module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ACT_MODULE',
    'width' => '10%',
    'default' => true,
    'name' => 'act_module',
  ),
  'next_work_center_res' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_NEXT_WORK_CENTER_RES',
    'id' => 'NEXT_WORK_CENTER_RES_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
    'name' => 'next_work_center_res',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'date_schedualed_start' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_START_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'date_schedualed_start',
  ),
  'date_schedualed_finish' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'date_schedualed_finish',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'next_work_center' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_NEXT_WORK_CENTER',
    'width' => '10%',
    'name' => 'next_work_center',
  ),
  'next_work_center_people' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_NEXT_WORK_CENTER_PEOPLE',
    'id' => 'NEXT_WORK_CENTER_PEOPLE_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
    'name' => 'next_work_center_people',
  ),
);
