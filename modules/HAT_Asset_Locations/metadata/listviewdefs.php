<?php
$module_name = 'HAT_Asset_Locations';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'LOCATION_TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION_TITLE',
    'width' => '35%',
    'default' => true,
  ),
  'ASSET_NODE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ASSET_NODE',
    'width' => '10%',
  ),
  'MAINT_NODE' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_MAINT_NODE',
    'width' => '10%',
  ),
  'MAINT_SITE' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MAINT_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
  ),
);
?>
