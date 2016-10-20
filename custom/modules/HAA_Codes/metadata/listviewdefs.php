<?php
$module_name = 'HAA_Codes';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CODE_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_CODE_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'CODE_MODULE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_CODE_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'CODE_TAG' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE_TAG',
    'width' => '10%',
    'default' => true,
  ),
  'HAA_FF' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HAA_FF',
    'id' => 'HAA_FF_ID',
    'link' => true,
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
