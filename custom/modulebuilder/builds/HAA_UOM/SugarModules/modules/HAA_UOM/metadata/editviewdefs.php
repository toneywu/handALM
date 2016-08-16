<?php
$module_name = 'HAA_UOM';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'uom_code',
            'label' => 'LBL_UOM_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'uom_class',
            'studio' => 'visible',
            'label' => 'LBL_UOM_CLASS',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'conversion',
            'label' => 'LBL_CONVERSION',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
