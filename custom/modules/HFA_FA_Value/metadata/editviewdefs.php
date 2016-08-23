<?php
$module_name = 'HFA_FA_Value';
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
            'name' => 'fixed_assets',
            'studio' => 'visible',
            'label' => 'LBL_FIXED_ASSETS',
          ),
          1 => 
          array (
            'name' => 'period',
            'label' => 'LBL_PERIOD',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'value_changed',
            'label' => 'LBL_VALUE_CHANGED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hfa_fixed_assets_hfa_fa_value_name',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
