<?php
$module_name = 'HAT_Counting_Rule_Dtls';
$listViewDefs [$module_name] = 
array (
  'ORGANIZATION_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ORGANIZATION_NAME',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'COUNTING_OBJ_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_OBJ_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SPLIT_ACCORD' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SPLIT_ACCORD',
    'width' => '10%',
    'default' => true,
  ),
  'ADDITIONAL_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_ADDITIONAL_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DEFAULT_COUNTER' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DEFAULT_COUNTER',
    'sortable' => false,
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
?>
