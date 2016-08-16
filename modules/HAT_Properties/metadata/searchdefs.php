<?php
$module_name = 'HAT_Properties';
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
      'opn_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OPN_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'opn_number',
      ),
      'opn_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_OPN_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'opn_status',
      ),
/**/
/*      'property_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_PROPERTY_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'property_type',
      ),*/

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
