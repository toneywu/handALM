<?php
$module_name = 'HAT_Counting_Batchs';
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
      'objects_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OBJECTS_TYPE',
        'width' => '10%',
        'name' => 'objects_type',
      ),
      'adjust_posted' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ADJUST_POSTED',
        'width' => '10%',
        'name' => 'adjust_posted',
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
