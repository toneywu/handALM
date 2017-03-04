<?php
$location_id = "";
if ($_SESSION['location_id'] != "") {
  $location_id = $_SESSION['location_id'];
}
//var_dump($_SESSION['location_id']);
if ($_REQUEST['location_id'] != "" && $location_id == "") {
  $location_id = $_REQUEST['location_id'];
}
//var_dump($_REQUEST['location_id']);
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
  'hat_asset_locations_id' => 'hit_ip_subnets.hat_asset_locations_id',
),


//'whereStatement'=>' (1=1 or ("'.$_REQUEST['location_advanced'].'" !=null and (hit_ip_subnets.purpose is null or  hit_ip_subnets.purpose not in ('INTERNET','BROADCASE','GATEWAY','MANAGERMENT','OTHERS')  ))) ',
'whereStatement'=>'((1=1 and "'.$location_id.'" ="" and (not exists (select 1 from hit_ip_allocations h where h.deleted=0 and h.hit_ip_subnets_id=hit_ip_subnets.id and (h.status !="UNEFFECTIVE" or h.status is null )) and hit_ip_subnets.purpose="" )) or ("'.$location_id.'" !="" and hit_ip_subnets.hat_asset_locations_id="'.$location_id.'" and (hit_ip_subnets.purpose is null or hit_ip_subnets.purpose not in ("NETWORK_ADDRESS","BROADCAST_ADDRESS","GATEWAY","Management_IP","NON_OUR_RESOURCES") ) and (not exists (select 1 from hit_ip_allocations h where h.deleted=0 and h.hit_ip_subnets_id=hit_ip_subnets.id and (h.status !="UNEFFECTIVE" or h.status is null )) or not exists(select 1 from hit_ip_allocations h where h.deleted=0 and h.hit_ip_subnets_id=hit_ip_subnets.id  )) ) )',
    'searchInputs' => array (
  1 => 'name',
  2 => 'parent_hit_ip',
  3 => 'ip_subnet',
  4 => 'location',
  5 => 'description',
  6=> 'hat_asset_locations_id',
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
    'label' => 'LBL_NAME_SEARCH',
  ),
  'ip_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_IP_TYPE',
    'width' => '10%',
    'default' => true,
    'options' => 'hit_ip_type_list',
    'name' => 'ip_type',
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
  'STATUS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'status',
    'customCode'=>'<span class="color_tag color_asset_status_{$COLOR_TAG}">{$STATUS}</span>',
  ),

  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '22%',
    'default' => true,
    'name' => 'description',
  ),
),
);
