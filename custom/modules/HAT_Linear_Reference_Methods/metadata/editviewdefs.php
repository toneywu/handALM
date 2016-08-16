<?php
$module_name = 'HAT_Linear_Reference_Methods';
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
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'domain',
            'studio' => 'visible',
            'label' => 'LBL_DOMAIN',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'linear_unit',
            'studio' => 'visible',
            'label' => 'LBL_LINEAR_UNIT',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'offset_x_unit',
            'studio' => 'visible',
            'label' => 'LBL_OFFSET_X_UNIT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'code_linear_y_reference',
            'studio' => 'visible',
            'label' => 'LBL_CODE_Y_REFERENCE',
          ),
          1 => 
          array (
            'name' => 'offset_y_unit',
            'studio' => 'visible',
            'label' => 'LBL_OFFSET_Y_UNIT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'code_linear_z_reference',
            'studio' => 'visible',
            'label' => 'LBL_CODE_Z_REFERENCE',
          ),
          1 => 
          array (
            'name' => 'offset_z_unit',
            'studio' => 'visible',
            'label' => 'LBL_OFFSET_Z_UNIT',
          ),
        ),
        6 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
