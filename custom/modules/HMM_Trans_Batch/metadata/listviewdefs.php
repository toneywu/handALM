<?php
$module_name = 'HMM_Trans_Batch';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TRANS_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TRANS_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
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
  'HMM_MO_REQUEST' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HMM_MO_REQUESTS',
    'id' => 'HMM_MO_REQUESTS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'HAM_WO' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WO',
    'id' => 'HAM_WO_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
);
?>
