<?php
$module_name = 'HAT_Meter_Types';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
          0 => 'name',
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
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
      ),
    ),
  ),
);
?>
