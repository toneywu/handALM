<?php
/**
 * 本文件被js/editview_treeview.js调用，在点击树节点时调用本文件，返回一个Jason形式的当前节点明细
 * 本文件参数有@id，@type[location or asset]
 * 返回的JASON示例： 
 * {"node":[{"id":"92a3dde3-47a1-7467-8e26-56b74a8bed37","html":" V-SH01 : Shanghai Hongqiao Area","type":"location"},{"id":"1f790755-182c-d9bd-9e9e-56b74a64455c","html":" V-SH02 : Shanghai Pudong Area","type":"location"}]}
 */
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db;
global $mod_strings, $app_strings, $app_list_strings,$dictionary;

require_once('cache/modules/HAT_Assets/HAT_Assetsvardefs.php');
require_once('cache/modules/HAT_Asset_Locations/HAT_Asset_Locationsvardefs.php');


$txt_jason ='';

function get_label_name ($field_name,$mod_name) {
  global $dictionary;
  return (translate($dictionary[$mod_name]['fields'][$field_name]['vname'],$mod_name));
}

function get_jason_field ($label_field_name, $mod_name,  $val_field,  $val_type='varchar', $val_field_id='', $relate_mod_name='') {
/*  $label_field_name, 标签字段对应的字段名
    $mod_name,  模块名
    $val_field,  数据内容
    $val_type='varchar', 数据项类型
    $con_string='',  连接符号，如JASON字段之间通过','关联
    $val_field_id='' 如果是ID字段，提供链接
*/
    if ($val_type=="bool") {
      $val_field = ($val_field==0)?'<input type=\"checkbox\">':'<input type=\"checkbox\" checked=\"checked\">';
    }elseif ($val_type=="relate" && isset($val_field_id)) {
      $val_field = '<a href=\"index.php?module='.$relate_mod_name.'&action=DetailView&record='.$val_field_id.'\">'.$val_field.'</a>';
    }
    if (isset($val_field)&&$val_field!='') {
      $return_text ='{"lab":"'.get_label_name($label_field_name, $mod_name).'","val":"'.$val_field.'"},';
    } else {
      $return_text ='';
    }
    return $return_text;
}


if($_GET['type']=="location") { //如果是Locationg来源，需要读取子位置和子资产（Asset来源只需要子资产）
   $sel_location ="SELECT 
                        ham_maint_sites.id site_id,
                        ham_maint_sites.name site_name,
                        hat_asset_locations.name location_name,
                        hat_asset_locations.id,
                        hat_asset_locations.map_address,
                        hat_asset_locations.inventory_mode,
                        hat_asset_locations.asset_node,
                        hat_asset_locations.maint_node,
                        hat_asset_locations.map_type
                    FROM
                        hat_asset_locations,ham_maint_sites
                    where
                      hat_asset_locations.ham_maint_sites_id = ham_maint_sites.id
                        and hat_asset_locations.deleted=0
                        and ham_maint_sites.deleted=0
                        AND hat_asset_locations.id = '".$_GET['id']."'";

//echo($sel_sub_asset);

$bean_locations = $db->query($sel_location); //无如是Location还是asset来源，都可以显示子资产
//if(is_array($bean_assets)) {
    while ( $location = $db->fetchByAssoc($bean_locations) ) {
       //$txt_jason .='"type":"location"';
       $txt_jason .='"fields":[';
       $txt_jason .=get_jason_field('name','HAT_Asset_Locations',$location['location_name']);
       $txt_jason .=get_jason_field('maint_site','HAT_Asset_Locations',$location['site_name']);
       $txt_jason .=get_jason_field('map_address','HAT_Asset_Locations',$location['map_address']);
       $txt_jason .=get_jason_field('inventory_mode','HAT_Asset_Locations',$app_list_strings['hat_inventory_node_list'][$location['inventory_mode']]);
       $txt_jason .=get_jason_field('asset_node','HAT_Asset_Locations',$location['asset_node'],'bool');
       $txt_jason .=get_jason_field('maint_node','HAT_Asset_Locations',$location['maint_node'],'bool');
       $txt_jason .=get_jason_field('map_type','HAT_Asset_Locations',$app_list_strings['cux_map_type_list'][$location['map_type']]); //最后一个没有,
       $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//最后一个没有,
       $txt_jason .='],';

       $txt_jason .='"btn":[{"link":"module=HAT_Asset_Locations&action=DetailView&record='.$location['id'].'","lab":"'.translate('LBL_ACT_VIEW_LOCATION','HAT_Asset_Locations').'"}';
       $txt_jason .=',{"link":"module=HAM_SRs&action=EditView&location_id='.$location['id'].'","lab":"'.translate('LBL_ACT_CREATE_SR','HAT_Asset_Locations').'"}';
       $txt_jason .=',{"link":"module=HAM_WO&action=EditView&location_id='.$location['id'].'","lab":"'.translate('LBL_ACT_CREATE_WO','HAT_Asset_Locations').'"}';
       $txt_jason .=']';


    }

} elseif ($_GET['type']=="asset") { //如果是Asset来源，只要读取下面的子资产,以Asset的ID检索
    $sel_asset ="SELECT 
                    hat_assets.id,
                    hat_assets.name,
                    hat_assets.asset_desc,
                    aos_products.id asset_group_id,
                    aos_products.name asset_group,
                    aos_product_categories.id category_id,
                    aos_product_categories.name asset_category,
                    hat_assets.asset_icon,
                    hat_assets.asset_status,
                    hat_assets.asset_name,
                    hat_assets.asset_number,
                    hat_assets.serial_number,
                    hat_assets.vin,
                    hat_assets.engine_num,
                    hat_assets.tracking_number,
                    hat_assets.brand,
                    hat_assets.model,
                    hat_assets.maintainable,
                    hat_assets.enable_it_rack,
                    hat_asset_locations.id location_id,
                    hat_asset_locations.name location_name,
                    ham_maint_sites.id site_id,
                    ham_maint_sites.name site_name,
                    hat_assets.location_desc,
                    haa_frameworks.name domain_name,
                    accounts_u.id using_org_id,
                    accounts_u.name using_org_name,
                    contacts_o.id using_person_id,
                    contacts_o.last_name using_person_name,
                    accounts_o.id owning_org_id,
                    accounts_o.name owning_org_name,
                    contacts_o.id owning_person_id,
                    contacts_o.`last_name` owning_person_name
                FROM
                    aos_products,
                    aos_product_categories,
                    haa_frameworks,
                    hat_assets
                        LEFT JOIN
                    accounts accounts_u ON (hat_assets.`using_org_id` = accounts_u.id
                        AND accounts_u.deleted = 0)
                        LEFT JOIN
                    contacts contacts_u ON (hat_assets.`using_person_id` = contacts_u.id
                        AND contacts_u.deleted = 0)
                        LEFT JOIN
                    accounts accounts_o ON (hat_assets.`using_org_id` = accounts_o.id
                        AND accounts_o.deleted = 0)
                        LEFT JOIN
                    contacts contacts_o ON (hat_assets.`using_person_id` = contacts_o.id
                        AND contacts_o.deleted = 0)
                        LEFT JOIN
                    (hat_asset_locations_hat_assets_c, hat_asset_locations, ham_maint_sites) ON (hat_assets.id = hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida = hat_asset_locations.id
                        AND hat_asset_locations.ham_maint_sites_id = ham_maint_sites.id
                        AND hat_asset_locations.deleted = 0
                        AND hat_asset_locations_hat_assets_c.deleted = 0
                        AND ham_maint_sites.deleted = 0)
                WHERE
                    hat_assets.aos_products_id = aos_products.id
                        AND hat_assets.aos_product_categories_id = aos_product_categories.id
                        AND hat_assets.haa_frameworks_id = haa_frameworks.id
                        AND hat_assets.deleted = 0
                        AND haa_frameworks.deleted = 0
                        AND aos_products.deleted = 0
                        AND aos_product_categories.deleted = 0
                        AND hat_assets.id = '".$_GET['id']."'";


//echo($sel_asset);

$bean_assets = $db->query($sel_asset); //无如是Location还是asset来源，都可以显示子资产
//if(is_array($bean_assets)) {
    while ( $asset = $db->fetchByAssoc($bean_assets) ) {


       $txt_jason .='"fields":[';
       $txt_jason .=get_jason_field('name','HAT_Assets',$asset['name']);
       $txt_jason .=get_jason_field('asset_desc','HAT_Assets',$asset['asset_desc']);
       $txt_jason .=get_jason_field('asset_category','HAT_Assets',$asset['asset_category']);
       $txt_jason .=get_jason_field('asset_group','HAT_Assets',$asset['asset_group']);
       $txt_jason .=get_jason_field('asset_status','HAT_Assets','<span class=\"color_tag color_asset_status_'.$asset['asset_status'].'\">'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'</span>');
       $txt_jason .=get_jason_field('asset_number','HAT_Assets',$asset['asset_number']);
       $txt_jason .=get_jason_field('serial_number','HAT_Assets',$asset['serial_number']);
       $txt_jason .=get_jason_field('vin','HAT_Assets',$asset['vin']);
       $txt_jason .=get_jason_field('engine_num','HAT_Assets',$asset['engine_num']);
       $txt_jason .=get_jason_field('tracking_number','HAT_Assets',$asset['tracking_number']);
       $txt_jason .=get_jason_field('asset_name','HAT_Assets',$asset['asset_name']);
       $txt_jason .=get_jason_field('brand','HAT_Assets',$asset['brand']);
       $txt_jason .=get_jason_field('model','HAT_Assets',$asset['model']);
       $txt_jason .=get_jason_field('maintainable','HAT_Assets',$asset['maintainable'],'bool');
       $txt_jason .=get_jason_field('enable_it_rack','HAT_Assets',$asset['enable_it_rack'],'bool');
       $txt_jason .=get_jason_field('hat_asset_locations_hat_assets_name','HAT_Assets',$asset['location_name'],'relate',$asset['location_id'],'HAT_Asset_Locations');
       $txt_jason .=get_jason_field('location_desc','HAT_Assets',$asset['location_desc']);
       $txt_jason .=get_jason_field('maint_site','HAT_Asset_Locations',$asset['site_name']);
       $txt_jason .=get_jason_field('domain','HAT_Assets',$asset['domain_name']);
       $txt_jason .=get_jason_field('owning_org','HAT_Assets',$asset['owning_org_name'],'relate',$asset['owning_org_id'],'Accounts');
       $txt_jason .=get_jason_field('owning_person','HAT_Assets',$asset['owning_person_id'],'relate',$asset['owning_person_id'],'Contacts');
       $txt_jason .=get_jason_field('using_org','HAT_Assets',$asset['using_org_name'],'relate',$asset['using_org_id'],'Accounts');
       $txt_jason .=get_jason_field('using_person','HAT_Assets',$asset['using_person_id'],'relate',$asset['using_person_id'],'Contacts');
       $txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//最后一个没有
       $txt_jason .='],';
       $txt_jason .='"btn":[{"link":"module=HAT_Asset_Locations&action=DetailView&record='.$asset['location_id'].'","lab":"'.translate('LBL_ACT_VIEW_LOCATION','HAT_Asset_Locations').'"}';
       $txt_jason .=',{"link":"module=HAT_Assets&action=DetailView&record='.$asset['id'].'","lab":"'.translate('LBL_ACT_VIEW_ASSET','HAT_Asset_Locations').'"}';
       $txt_jason .=',{"link":"module=HAM_SRs&action=EditView&hat_assets_id='.$asset['id'].'","lab":"'.translate('LBL_ACT_CREATE_SR','HAT_Asset_Locations').'"}';
       $txt_jason .=',{"link":"module=HAM_WO&action=EditView&hat_assets_id='.$asset['id'].'","lab":"'.translate('LBL_ACT_CREATE_WO','HAT_Asset_Locations').'"}';
       $txt_jason .='],';
/*
       //$txt_jason .='"id":"'.$asset['id'].'",';
       $txt_jason .='"name":"'.$asset['name'].'",';
       $txt_jason .='"asset_desc":"'.$asset['asset_desc'].'",';
       $txt_jason .='"asset_group_id":"'.$asset['asset_group_id'].'",';
       $txt_jason .='"asset_group":"'.$asset['asset_group'].'",';
       $txt_jason .='"category_id":"'.$asset['category_id'].'",';
       $txt_jason .='"category":"'.$asset['category'].'",';
       $txt_jason .='"asset_status":"<span class=\"color_tag color_asset_status_'.$asset['asset_status'].'\">'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'</span>",';
       $txt_jason .='"asset_name":"'.$asset['asset_name'].'",';
       $txt_jason .='"asset_number":"'.$asset['asset_number'].'",';
       $txt_jason .='"serial_number":"'.$asset['serial_number'].'",';
       $txt_jason .='"vin":"'.$asset['vin'].'",';
       $txt_jason .='"engine_num":"'.$asset['engine_num'].'",';
       $txt_jason .='"tracking_number":"'.$asset['tracking_number'].'",';
       $txt_jason .='"brand":"'.$asset['brand'].'",';
       $txt_jason .='"model":"'.$asset['model'].'",';
       $txt_jason .='"maintainable":"'.(($asset['maintainable']==0)?'NO':'YES').'",';
       $txt_jason .='"enable_it_rack":"'.$asset['enable_it_rack'].'",';

      if ($asset['enable_it_rack']==1) {
        //如果已经有机柜管理，则继续读取机柜信息
        $bean_rack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('hat_assets_id'=>$asset['id']));
        $txt_jason .='"hit_racks":"'. $bean_rack->name.'",';
        $txt_jason .='"hit_racks_id":"'. $bean_rack->id.'",';
      }

       $txt_jason .='"location_desc":"'.$asset['location_desc'].'",';
       $txt_jason .='"location_id":"'.$asset['location_id'].'",';
       $txt_jason .='"location_name":"'.$asset['location_name'].'",';
       $txt_jason .='"site_id":"'.$asset['site_id'].'",';
       $txt_jason .='"site_name":"'.$asset['site_name'].'",';
       $txt_jason .='"domain_name":"'.$asset['domain_name'].'",';
       $txt_jason .='"location_desc":"'.$asset['location_desc'].'",';
       $txt_jason .='"account_id":"'.$asset['account_id'].'",';
       $txt_jason .='"account_name":"'.$asset['account_name'].'",';
       $txt_jason .='"contact_id":"'.$asset['contact_id'].'",';
       $txt_jason .='"contact_name":"'.$asset['contact_name'].'",';*/
       $txt_jason .='"type":"asset"';
    }
//}
}

//$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//去除最后的,
$txt_jason='{'.$txt_jason.'}';
echo($txt_jason);



exit();