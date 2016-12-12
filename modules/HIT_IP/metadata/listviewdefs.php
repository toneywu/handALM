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
    'STATUS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '30%',
    'default' => true,
    'customCode'=>'<span class="color_tag color_asset_status_{$COLOR_TAG}">{$STATUS}</span>',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '50%',
    'default' => true,
  ),

);
?>
