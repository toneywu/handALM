<?php
$module_name = 'HAA_Import_Sets';
$listViewDefs [$module_name] = 
array (
  'IMP_FUNC_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IMP_FUNC_CODE',
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
  'EXEC_FILE_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EXEC_FILE_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'VALIDATE_FUNC_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VALIDATE_FUNC_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'IMPORT_FUNC_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IMPORT_FUNC_NAME',
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
