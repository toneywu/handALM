<?php
$module_name = 'HAA_Values';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_FLEX_MEANING',
    'default' => true,
    'link' => true,
  ),
  'FLEX_VALUE_SET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FLEX_VALUE_SET',
    'id' => 'HAA_VALUESETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PARENT_FLEX_VALUE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_FLEX_VALUE',
    'id' => 'HAA_VALUES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'FLEX_VALUE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FLEX_VALUE',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
);
?>
