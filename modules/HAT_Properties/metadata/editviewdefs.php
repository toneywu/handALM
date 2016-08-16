<?php
$module_name = 'HAT_Properties';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'domain',
          1 => ''
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'property_type',
            'studio' => 'visible',
            'label' => 'LBL_PROPERTY_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'opn_number',
            'label' => 'LBL_OPN_NUMBER',
          ),
          1 => 
          array (
            'name' => 'opn_status',
            'studio' => 'visible',
            'label' => 'LBL_OPN_STATUS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'organization',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION',
            'displayParams' => 
            array (
              'is_le_c_advanced' => '1',
              ),
          ),
          1 => 
          array (
            'name' => 'own_department',
            'studio' => 'visible',
            'label' => 'LBL_OWN_DEPARTMENT',
            'displayParams' => 
            array (
              'is_le_c_advanced' => '0',
              ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'from_date',
            'label' => 'LBL_FROM_DATE',
          ),
          1 => 
          array (
            'name' => 'to_date',
            'label' => 'LBL_TO_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'land_get_type',
            'studio' => 'visible',
            'label' => 'LBL_LAND_GET_TYPE',
          ),
        ),
        6 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
