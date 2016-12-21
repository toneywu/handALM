<?php
$module_name = 'HAT_Counting_Rule_Dtls';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'organization_name' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ORGANIZATION_NAME',
        'id' => 'ACCOUNT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'organization_name',
      ),
      'counting_obj_type' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_COUNTING_OBJ_TYPE',
        'id' => 'HAA_CODES_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'counting_obj_type',
      ),
      'split_accord' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_SPLIT_ACCORD',
        'width' => '10%',
        'default' => true,
        'name' => 'split_accord',
      ),
      'additional_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_ADDITIONAL_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'additional_comment',
      ),
      'default_counter' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_DEFAULT_COUNTER',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'default_counter',
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
