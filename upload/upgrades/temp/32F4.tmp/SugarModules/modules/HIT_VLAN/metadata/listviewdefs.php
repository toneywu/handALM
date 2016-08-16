<?php
$module_name = 'HIT_VLAN';
$listViewDefs [$module_name] = 
array (
  'VALN_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VALN_NUM',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VLAN_USAGE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VLAN_USAGE',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '30%',
    'default' => true,
  ),
);
?>
