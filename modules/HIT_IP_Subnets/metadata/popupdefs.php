<?php
$popupMeta = array (
    'moduleMain' => 'HIT_IP_Subnets',
    'varName' => 'HIT_IP_Subnets',
    'orderBy' => 'hit_ip_subnets.name',
    'whereClauses' => array (
  'name' => 'hit_ip_subnets.name',
  'parent_hit_ip' => 'hit_ip_subnets.parent_hit_ip',
  'ip_subnet' => 'hit_ip_subnets.ip_subnet',
  'location' => 'hit_ip_subnets.location',
  'description' => 'hit_ip_subnets.description',
),
    'searchInputs' => array (
  1 => 'name',
  2 => 'parent_hit_ip',
  3 => 'ip_subnet',
  4 => 'location',
  5 => 'description',
),
    'searchdefs' => array (
  'parent_hit_ip' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_HIT_IP',
    'id' => 'PARENT_HIT_IP_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'parent_hit_ip',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'ip_subnet' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IP_SUBNET',
    'width' => '10%',
    'name' => 'ip_subnet',
  ),
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'location',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
  ),
),
    'listviewdefs' => array (
  'PARENT_HIT_IP' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_HIT_IP',
    'id' => 'PARENT_HIT_IP_ID',
    //'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'parent_hit_ip',
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'location',
  ),
  'IP_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_IP_TYPE',
    'width' => '10%',
    'default' => true,
	'options' => 'hit_ip_type_list',
    'name' => 'ip_type',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '32%',
    'default' => true,
    'name' => 'description',
  ),
),
);
