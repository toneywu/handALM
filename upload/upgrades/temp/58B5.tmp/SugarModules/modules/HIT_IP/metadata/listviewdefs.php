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
  ),
  'IP_INTERNET' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IP_INTERNET',
    'width' => '10%',
    'default' => true,
  ),
  'IP_USAGE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IP_USAGE',
    'width' => '10%',
    'default' => true,
  ),
  'VLAN' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_VLAN',
    'id' => 'HIT_VLAN_ID',
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
);
?>
