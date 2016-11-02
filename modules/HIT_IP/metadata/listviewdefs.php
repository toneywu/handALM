<?php
$module_name = 'HIT_IP';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),/*
  'VLAN' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_VLAN',
    'id' => 'HIT_VLAN_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),*/

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
    'width' => '60%',
    'default' => true,
  ),
);
?>
