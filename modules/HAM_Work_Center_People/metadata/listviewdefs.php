<?php
$module_name = 'HAM_Work_Center_People';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PEROPLE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PEROPLE',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ORGANIZATION_NAME' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_ORGANIZATION_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'USER_NAME' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_USER_NAME',
    'width' => '10%',
    'default' => true,
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
