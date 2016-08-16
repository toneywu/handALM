<?php
$module_name = 'HAA_UOM_Conversions';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
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
            'name' => 'aos_products_haa_uom_conversions_1_name',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'destination_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_DESTINATION_UOM_CLASS',
          ),
          1 => 
          array (
            'name' => 'destination_unit',
            'studio' => 'visible',
            'label' => 'LBL_DESTINATION_UNIT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'source_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_UOM_CLASS',
          ),
          1 => 
          array (
            'name' => 'source_uom',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_UOM',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'conversion',
            'label' => 'LBL_CONVERSION',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 'name',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
