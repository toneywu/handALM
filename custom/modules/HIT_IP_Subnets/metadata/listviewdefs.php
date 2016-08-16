<?php
$module_name = 'HIT_IP_Subnets';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PARENT_HIT_IP' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_HIT_IP',
    'id' => 'PARENT_HIT_IP_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TUNNEL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TUNNEL',
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
    'width' => '32%',
    'default' => true,
  ),
);
?>
