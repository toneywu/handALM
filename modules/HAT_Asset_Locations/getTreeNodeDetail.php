<?php
//s本文件应当没有任务作用了，是敷衍TreeNodeDetailHTML的之前版本 */
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db,$app_list_strings;
$txt_jason ='';

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
       //$txt_jason .='"id":"'.$asset['id'].'",';
       $txt_jason .='"location_name":"'.$location['location_name'].'",';
       $txt_jason .='"site_id":"'.$location['site_id'].'",';
       $txt_jason .='"site_name":"'.$location['site_name'].'",';
       $txt_jason .='"map_address":"'.$location['map_address'].'",';
       $txt_jason .='"inventory_mode":"'.$location['inventory_mode'].'",';
       $txt_jason .='"asset_node":"'.($location['asset_node']==0?'NO':'YES').'",';
       $txt_jason .='"maint_node":"'.($location['maint_node']==0?'NO':'YES').'",';
       $txt_jason .='"map_type":"'.$location['map_type'].'",';
       $txt_jason .='"type":"location"';
    }

} elseif ($_GET['type']=="asset") { //如果是Asset来源，只要读取下面的子资产,以Asset的ID检索
    $sel_asset ="SELECT 
                    hat_assets.id,
                    hat_assets.name,
                    hat_assets.asset_desc,
                    aos_products.id asset_group_id,
                    aos_products.name asset_group,
                    aos_product_categories.id category_id,
                    aos_product_categories.name category,
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
                    accounts.id account_id,
                    accounts.name account_name,
                    contacts.id contact_id,
                    contacts.last_name contact_name,
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
                    accounts ON (hat_assets.`using_org_id` = accounts.id
                        AND accounts.deleted = 0)
                        LEFT JOIN
                    contacts ON (hat_assets.`using_person_id` = contacts.id
                        AND contacts.deleted = 0)
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


//echo($sel_sub_asset);

$bean_assets = $db->query($sel_asset); //无如是Location还是asset来源，都可以显示子资产
//if(is_array($bean_assets)) {
    while ( $asset = $db->fetchByAssoc($bean_assets) ) {


       //$txt_jason .='"id":"'.$asset['id'].'",';
       $txt_jason .='"name":"'.$asset['name'].'",';
       $txt_jason .='"asset_desc":"'.$asset['asset_desc'].'",';
       $txt_jason .='"asset_group_id":"'.$asset['asset_group_id'].'",';
       $txt_jason .='"asset_group":"'.$asset['asset_group'].'",';
       $txt_jason .='"category_id":"'.$asset['category_id'].'",';
       $txt_jason .='"category":"'.$asset['category'].'",';
       $txt_jason .='"asset_status":"<span class=\"color_tag color_asset_status_'.$asset['asset_status'].'\">'.$app_list_strings['asset_status_list'][$asset['asset_status']].'</span>",';
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
       $txt_jason .='"contact_name":"'.$asset['contact_name'].'",';
       $txt_jason .='"type":"asset"';
    }
//}
}

//$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);//去除最后的,
$txt_jason='{'.$txt_jason.'}';
echo($txt_jason);



exit();