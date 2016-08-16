<?php
$module_name = 'HAT_Asset_QUAL_Details';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HAT_ASSET_QUAL' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_QUAL',
    'id' => 'HAT_ASSET_QUAL_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'QUAL_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_QUAL_ORG',
    'id' => 'QUAL_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'QUAL_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_QUAL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'EFFECTIVE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EFFECTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'QUAL_RESULT_PASSED' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_QUAL_RESULT_PASSED',
    'width' => '5%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '20%',
    'default' => true,
  ),
);
?>
