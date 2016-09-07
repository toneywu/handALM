<?php
$module_name = 'HIT_VNI_LIST';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'BANDWIDTH_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_BANDWIDTH_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'CUSTOMER_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CUSTOMER_NAME',
    'id' => 'CUSTOMER_ID',
    'link' => true,
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
);
?>
