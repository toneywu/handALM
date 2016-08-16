<?php
$module_name = 'HAT_Asset_Trans_Batch';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSET_TRANS_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'default' => true,
    'label' => 'LBL_ASSET_TRANS_STATUS',
    'width' => '5%',
  ),
  'CURRENT_ORGANIZATION_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CURRENT_ORGANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'TARGET_ORGANIZATION_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TARGET_ORGANIZATION',
    'id' => 'ACCOUNT_ID1_C',
    'link' => true,
    'width' => '10%',
  ),
);
?>
