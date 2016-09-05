<?php
$module_name = 'HAM_WOOP';
$listViewDefs [$module_name] = 
array (
  'WOOP_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WOOP_NUMBER',
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
  'WOOP_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_WOOP_STATUS',
    'width' => '12%',
    'default' => true,
  ),
  'DATE_SCHEDUALED_START' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_SCHEDUALED_FINISH' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '10%',
    'default' => true,
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
  ),
  'WO_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_NUMBER',
    'width' => '5%',
    'default' => true,
  ),
  'ACT_MODULE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ACT_MODULE',
    'width' => '10%',
    'default' => false,
  ),
);
?>
