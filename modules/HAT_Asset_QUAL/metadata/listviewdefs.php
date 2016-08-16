<?php
$module_name = 'HAT_Asset_QUAL';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
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
  'MGMT_CRITICALITY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MGMT_CRITICALITY',
    'width' => '10%',
    'default' => true,
  ),
  'LASTEST_QUAL_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LASTEST_QUAL_ORG',
    'id' => 'LASTEST_QUAL_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LATEST_QUAL_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_LATEST_QUAL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'LATEST_EFFECTIVE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_LATEST_EFFECTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
);
?>
