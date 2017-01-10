<?php
$module_name = 'HAA_Interfaces';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'INTERFACE_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INTERFACE_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'LINK_SYSTEM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LINK_SYSTEM',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'INTERFACE_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_INTERFACE_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'OWN_MODULE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_OWN_MODULE',
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
   'BASED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_BASED_FLAG',
    'width' => '10%',
  ),
  'EXECUTE_FUNC_FILES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EXECUTE_FUNC_FILES',
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
);
?>
