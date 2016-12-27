<?php
$module_name = 'HAT_Counting_Tasks';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'task_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TASK_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'task_number',
      ),
      'planed_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PLANED_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'planed_start_date',
      ),
      'planed_complete_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PLANED_COMPLETE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'planed_complete_date',
      ),
      'adjust_posted' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADJUST_POSTED',
        'width' => '10%',
        'name' => 'adjust_posted',
      ),
      'counting_task_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_COUNTING_TASK_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'counting_task_status',
      ),
      'objects_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_OBJECTS_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'objects_type',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
