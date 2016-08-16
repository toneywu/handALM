<?php
$module_name = 'HAT_Meter_Types';
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
      'effective' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EFFECTIVE',
        'width' => '10%',
        'name' => 'effective',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'value_change' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VALUE_CHANGE',
        'width' => '10%',
        'name' => 'value_change',
      ),
      'uom' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_UOM',
        'width' => '10%',
        'name' => 'uom',
      ),
      'type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'name' => 'type',
      ),
      'effective' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EFFECTIVE',
        'width' => '10%',
        'name' => 'effective',
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
