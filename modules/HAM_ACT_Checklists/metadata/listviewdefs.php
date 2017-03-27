<?php
$module_name = 'HAM_ACT_Checklists';
$listViewDefs [$module_name] = 
array (
  'SEQ' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_SEQ',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VALUE_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VALUE_TYPE',
    'width' => '10%',
  ),
  'STANDARD_REFERENCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STANDARD_REFERENCE',
    'width' => '15%',
    'default' => true,
  ),
  'METHOD' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_METHOD',
    'width' => '15%',
    'default' => true,
  ),
  'STD_MIN' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_STD_MIN',
    'width' => '10%',
  ),
  'STD_MAX' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_STD_MAX',
    'width' => '10%',
  ),
  'TARGET' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_TARGET',
    'width' => '10%',
  ),
  'UOM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UOM',
    'id' => 'UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
