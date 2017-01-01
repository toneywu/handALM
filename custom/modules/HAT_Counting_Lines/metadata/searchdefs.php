<?php
$module_name = 'HAT_Counting_Lines';
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
      'asset' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ASSET',
        'id' => 'HAT_ASSETS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'asset',
      ),
      'asset_desc' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_DESC',
        'width' => '10%',
        'name' => 'asset_desc',
      ),
      'counting_task' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_COUNTING_TASK',
        'id' => 'HAT_COUNTING_TASKS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'counting_task',
      ),
      'counting_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_COUNTING_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'counting_status',
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
