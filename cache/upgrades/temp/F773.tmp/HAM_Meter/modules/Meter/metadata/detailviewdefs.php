<?php
$module_name = 'HAT_Meters';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'uom',
            'studio' => 'visible',
            'label' => 'LBL_UOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'value_change',
            'studio' => 'visible',
            'label' => 'LBL_VALUE_CHANGE',
          ),
          1 => 
          array (
            'name' => 'effective',
            'label' => 'LBL_EFFECTIVE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
          1 => 'date_entered',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hat_meters_hat_meter_types_name',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
