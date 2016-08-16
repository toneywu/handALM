<?php
$module_name = 'HPR_AM_Catelog';
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
          0 => 
          array (
            'name' => 'asset_categories',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_CATEGORIES',
          ),
          1 => 
          array (
            'name' => 'am_roles',
            'studio' => 'visible',
            'label' => 'LBL_AM_ROLES',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
