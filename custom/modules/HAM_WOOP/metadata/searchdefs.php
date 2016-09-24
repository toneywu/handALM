<?php
$module_name = 'HAM_WOOP';
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
      'woop_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_WOOP_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'woop_status',
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
