<?php
$module_name = 'HAT_Linear_Elements';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        1 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        2 => 
        array (
          'file' => 'modules/HAT_Linear_Elements/js/HAT_Linear_Elements_editview.js',
        ),
      ),
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
            'name' => 'parent_asset',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_ASSET',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => '',
        ),
        /*2 => 
        array (
          0 => 
          array (
            'name' => 'linear_start_measure',
            'label' => 'LBL_LINEAR_START',
          ),
          1 => 
          array (
            'name' => 'linear_distance',
            'studio' => 'visible',
            'label' => 'LBL_LINEAR_DISTANCE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'linear_end_measure',
            'label' => 'LBL_LINEAR_END',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'element_asset',
            'studio' => 'visible',
            'label' => 'LBL_ELEMENT_ASSET',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'linear_element_details',
            'label' => 'LBL_LINEAR_ELEMENT_DETAILS',
          ),
          1 => '',
        ),*/
        2 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
