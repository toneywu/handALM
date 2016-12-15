<?php
$module_name = 'HPR_Groups';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'frameworks' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_FRAMEWORKS',
        'id' => 'HAA_FRAMEWORKS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'frameworks',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'enabled_flag' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ENABLED_FLAG',
        'width' => '10%',
        'name' => 'enabled_flag',
      ),
      'description' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
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