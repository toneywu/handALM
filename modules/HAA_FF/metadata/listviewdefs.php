<?php
$module_name = 'HAA_FF';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FF_MODULE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MODULE',
    'width' => '10%',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
  ),
  'DOMAIN' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_DOMAIN',
    'id' => 'HAA_FRAMEWORKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
