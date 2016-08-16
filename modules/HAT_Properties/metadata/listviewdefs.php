<?php
$module_name = 'HAT_Properties';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'OPN_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OPN_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'OPN_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_OPN_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'PROPERTY_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PROPERTY_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'ORGANIZATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ORGANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'OWN_DEPARTMENT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWN_DEPARTMENT',
    'id' => 'ACCOUNT_ID1_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
