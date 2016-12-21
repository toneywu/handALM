<?php
$module_name = 'HAT_Counting_Tasks';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TASK_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TASK_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'PLANED_START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PLANED_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'PLANED_COMPLETE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PLANED_COMPLETE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'SNAPSHOT_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SNAPSHOT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'ADJUST_POSTED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADJUST_POSTED',
    'width' => '10%',
  ),
  'OBJECTS_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_OBJECTS_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'COUNTING_TASK_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_TASK_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'FRAMEWORKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORKS',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
