<?php

/*if (isset($_REQUEST["target_using_org_id_advanced"])) {
  $target_using_org_id_advanced=$_REQUEST["target_using_org_id_advanced"];
} else {
  $target_using_org_id_advanced="";
}
*/
if (isset($_REQUEST["target_owning_org_id_advanced"])) {
  $target_using_org_id_advanced=$_REQUEST["target_owning_org_id_advanced"];
} else {
  $target_using_org_id_advanced="";
}

if (isset($_REQUEST["asset_type"])) {
  $asset_type=$_REQUEST["asset_type"];
} else {
  $asset_type="";
}
if(isset($_REQUEST["asset_type_advanced"])&&$_REQUEST["asset_type_advanced"]!=""){
	$asset_type=$_REQUEST["asset_type_advanced"];
}

$where_avaliable_it_equipments="";
if(isset($_REQUEST["avaliable_it_equipments"])&&$_REQUEST["avaliable_it_equipments"]=="true"){
  $where_avaliable_it_equipments = " AND hat_assets.`enable_it_ports`=1 AND  EXISTS
  (SELECT 1 FROM hit_rack_allocations WHERE hit_rack_allocations.`deleted` = 0 AND hit_rack_allocations.`hat_assets_id`=hat_assets.id AND hit_rack_allocations.`hit_racks_id`)";//没有分配的IT类资产
}

$popupMeta = array (
    'moduleMain' => 'HAT_Assets',
    'varName' => 'HAT_Assets',
    'orderBy' => 'hat_assets.name',
    'whereClauses' => array (
  'name' => 'hat_assets.name',
  'asset_desc' => 'hat_assets.asset_desc',
  'serial_number' => 'hat_assets.serial_number',
  'hat_asset_locations_hat_assets_name' => 'hat_assets.hat_asset_locations_hat_assets_name',
  'hat_assets_accounts_name' => 'hat_assets.hat_assets_accounts_name',
  'owning_org' => 'hat_assets.owning_org',
  'framework' => 'hat_assets.framework',
  'asset_group' => 'hat_assets.asset_group',
  'asset_type' => 'hat_assets.asset_type',
),

//  'whereStatement'=>'hat_assets.haa_frameworks_id = "'.$_SESSION["current_framework"].'"',//限制了Framework
                    /*.' AND (("'.$target_using_org_id_advanced. '"!="" and EXISTS (SELECT 1 FROM hit_racks r,hit_rack_allocations ra WHERE hat_assets.id = r.hat_assets_id AND r.id = ra.hit_racks_id AND ra.deleted = 0 AND hat_assets.using_org_id = "'.$target_using_org_id_advanced.'")) or ""="'.$target_using_org_id_advanced.'")',*/
  'whereStatement'=>'hat_assets.haa_frameworks_id = "'.$_SESSION["current_framework"].'"'
                    .' AND (("'.$target_using_org_id_advanced. '"!="" and EXISTS (SELECT 1 FROM hit_racks r,hit_rack_allocations ra WHERE hat_assets.id = r.hat_assets_id AND r.id = ra.hit_racks_id AND ra.deleted = 0 AND hat_assets.using_org_id = "'.$target_using_org_id_advanced.'"))  or ""="'.$target_using_org_id_advanced.'") and ("'.$asset_type.'" ="" or( "'.$asset_type.'"="ODF" and exists (select 1 from aos_products where aos_products.name="ODF" and aos_products.deleted=0 and aos_products.id=hat_assets.aos_products_id) )) '
                    .$where_avaliable_it_equipments,
  //下面的SQL是有问题的，不知道什么业务场景会用到toney.wu
  //似乎是需要实现，如果当前使用部门不为空，则如果机柜分配的使用部门为当前部门时，也列出
  //这个删除不是很确定，但之前的Where写的似乎也有BUG

    'searchInputs' => array (
  1 => 'name',
  2 => 'asset_desc',
  3 => 'serial_number',
  4 => 'hat_asset_locations_hat_assets_name',
  5 => 'hat_assets_accounts_name',
  6 => 'owning_org',
  7 => 'framework',
  10 => 'asset_type',
  11 => 'asset_group',
),
    'searchdefs' => array (
  'framework' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORK',
    'id' => 'HAA_FRAMEWORKS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'framework',
  ),
  'asset_group' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_GROUP',
    'id' => 'AOS_PRODUCTS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'asset_group',
  ),
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'asset_desc' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'name' => 'asset_desc',
  ),
  'serial_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NUMBER',
    'width' => '10%',
    'name' => 'serial_number',
  ),
  'hat_asset_locations_hat_assets_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'name' => 'hat_asset_locations_hat_assets_name',
  ),
  'hat_assets_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'hat_assets_accounts_name',
  ),
  'owning_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWING_ORG',
    'id' => 'OWNING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'owning_org',
  ),
  'asset_type' => 
  array (
    'type' => 'varchar',
    'label' => '',
    'width' => '10%',
    'name' => 'asset_type',
  ),
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
  'ASSET_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'default' => true,
    'name' => 'asset_desc',
  ),
  'HAT_ASSET_LOCATIONS_HAT_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_asset_locations_hat_assets_name',
  ),
  'HAT_ASSETS_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_assets_accounts_name',
  ),
  'HAT_ASSETS_CONTACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
    'id' => 'HAT_ASSETS_CONTACTSCONTACTS_IDA',
    'width' => '10%',
    'default' => true,
    'name' => 'hat_assets_contacts_name',
  ),
),
);
