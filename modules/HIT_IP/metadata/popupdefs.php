<?php
$popupMeta = array (
    'moduleMain' => 'HIT_IP',
    'varName' => 'HIT_IP',
    'orderBy' => 'hit_ip.name',
    'whereClauses' => array (
  'name' => 'hit_ip.name',
),
    'searchInputs' => array (
  0 => 'hit_ip_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'name' => 'name',
  ),
  'IP_INTERNET' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IP_INTERNET',
    'width' => '10%',
    'default' => true,
    'name' => 'ip_internet',
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
  'IP_USAGE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IP_USAGE',
    'width' => '10%',
    'default' => true,
    'name' => 'ip_usage',
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
    'name' => 'vlan',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
),
);
