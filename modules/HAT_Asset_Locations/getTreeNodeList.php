<?php
/************************************************************
*本文件被modules/HAT_Asset_Locations/getTreeNode.php调用，
*用于处理查询的业务场景
*当REQUST(defualt_list)不为空，或不为NONE时进行默认查询的处理
* ************************************************************/
$current_mode_sql="1=1";

if (isset($_REQUEST['current_mode'])) {
  $_SESSION['current_mode'] = $_REQUEST['current_mode'];
}
if (isset($_SESSION['current_mode'])) {
  $_SESSION['current_mode'] = $_SESSION['current_mode'];
    if($_SESSION['current_mode']=="rack"||$_SESSION['current_mode']=="rackposition"||$_SESSION['current_mode']=="rackasset") {
        $current_mode_sql = "hat_assets.enable_it_rack = 1 ";
    } elseif ($_SESSION['current_mode']=="it") {
        $current_mode_sql = "hat_assets.enable_it_ports = 1 ";
    }
}

if (isset($_REQUEST['site_id'])&&$_REQUEST['site_id']!="undefined" && $_REQUEST['site_id']!="") {
    $current_site_sql = " AND hat_assets.id IN (SELECT halhac.hat_asset_locations_hat_assetshat_assets_idb FROM hat_asset_locations_hat_assets_c halhac, hat_asset_locations WHERE halhac.hat_asset_locations_hat_assetshat_asset_locations_ida = hat_asset_locations.id AND halhac.deleted=0 AND hat_asset_locations.deleted = 0 AND hat_asset_locations.`ham_maint_sites_id` = '".$_REQUEST['site_id']."')";
} else {
    $current_site_sql = "";
}
$where_sql = " AND NOT EXISTS (
      SELECT
        1
      FROM
        hit_rack_allocations
      WHERE
        hit_rack_allocations.`deleted` = 0
      AND hit_rack_allocations.`hat_assets_id` = hat_assets.id
    )";

if ($_REQUEST['type']=="rack" && isset($_REQUEST['query_id'])) {
    //wo_asset_trans 显示当前工作单的所有资产事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hat_assets.enable_linear,hat_assets.enable_it_rack,hat_assets.enable_it_ports
                        FROM
                          hat_assets
                        WHERE hat_assets.`deleted`=0
                          AND hat_assets.asset_status != 'Discard'
                          AND hat_assets.id ='".$_REQUEST['query_id']."'";

                        //echo $sel_sub_asset;
}


if ($_REQUEST['type']=="wo_asset_trans" && isset($_REQUEST['query_id'])) {
    //wo_asset_trans 显示当前工作单的所有资产事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT DISTINCT
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hit_racks.id rack_id,hat_assets.enable_linear,hat_assets.enable_it_rack,hat_assets.enable_it_ports
                        FROM
                          hat_assets
                          LEFT JOIN hit_racks ON (hit_racks.`hat_assets_id`=hat_assets.id AND hit_racks.`deleted`=0),
                          hat_asset_trans,
                          hat_asset_trans_batch
                        WHERE hat_asset_trans.`deleted` = 0
                          AND hat_assets.asset_status != 'Discard'
                          AND hat_asset_trans_batch.`deleted` = 0
                          AND hat_assets.`deleted`=0
                          AND hat_asset_trans.`batch_id` = hat_asset_trans_batch.`id`
                          AND hat_assets.id = hat_asset_trans.`asset_id`
                          AND hat_asset_trans_batch.`source_wo_id`='".$_REQUEST['query_id']."'
                          AND hat_asset_trans_batch.`asset_trans_status` != 'DRAFT'
                          AND hat_asset_trans_batch.`asset_trans_status` != 'CANCELED'
                          AND ".$current_mode_sql.$current_site_sql.$where_sql." ORDER by hat_assets.name ASC";
                         //
}

if ($_REQUEST['type']=="wo_ip_trans" ) {
    //wo_ip_trans 显示当前工作单的所有网络资源事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT DISTINCT 
                          hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hat_assets.enable_linear,hat_assets.enable_it_rack,hat_assets.enable_it_ports
                        FROM
                          hat_assets 
                        WHERE hat_assets.`deleted` = 0 
                          AND hat_assets.asset_status != 'Discard'
                          AND hat_assets.id IN 
                          (SELECT 
                            hit_ip_trans.hat_assets_id 
                          FROM
                            hit_ip_trans,
                            hit_ip_trans_batch 
                          WHERE hit_ip_trans.`deleted` = 0 
                            AND hit_ip_trans_batch.`deleted` = 0 
                            AND hit_ip_trans.`hit_ip_trans_batch_id` = hit_ip_trans_batch.`id` 
                            AND hit_ip_trans_batch.`asset_trans_status` != 'DRAFT' 
                            AND hit_ip_trans_batch.`asset_trans_status` != 'CANCELED'
                            AND hit_ip_trans_batch.`source_wo_id`='".$_REQUEST['query_id']."'
                          UNION ALL SELECT 
                            hit_ip_trans.access_assets_id 
                          FROM
                            hit_ip_trans,
                            hit_ip_trans_batch 
                          WHERE hit_ip_trans.`deleted` = 0 
                            AND hit_ip_trans_batch.`deleted` = 0 
                            AND hit_ip_trans.`hit_ip_trans_batch_id` = hit_ip_trans_batch.`id` 
                            AND hit_ip_trans_batch.`asset_trans_status` != 'DRAFT' 
                            AND hit_ip_trans_batch.`asset_trans_status` != 'CANCELED' 
                            AND hit_ip_trans_batch.`source_wo_id`='".$_REQUEST['query_id']."'
                            )
                            AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";
  //echo $sel_sub_asset;
}


if ($_REQUEST['type']=="current_using_org" ) {
    //wo_ip_trans 显示当前工作单的所有网络资源事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT
                          hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hat_assets.enable_linear,hat_assets.enable_it_rack,hat_assets.enable_it_ports
                        FROM
                          hat_assets,
                          accounts
                        WHERE hat_assets.`deleted` = 0
                          AND hat_assets.asset_status != 'Discard'
                          AND accounts.`deleted` = 0
                          AND accounts.id = hat_assets.`using_org_id`
                                                    AND accounts.id='".$_REQUEST['query_id']."'
                            AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";

  //echo $sel_sub_asset;
}

if ($_REQUEST['type']=="current_using_org_none" ) {
    //wo_ip_trans 显示当前工作单的所有网络资源事务处理行中出现的内容
    if(isset($_REQUEST['query_id']) && $_REQUEST['query_id'] != ''){
      $_SESSION['query_id'] = $_REQUEST['query_id'];
    }else{
      //echo "abcd ".$_REQUEST['query_id'];
    } 
    $sel_sub_location ="SELECT
                            `hat_asset_locations`.id,
                            `hat_asset_locations`.name,
                            `hat_asset_locations`.location_title,
                            `hat_asset_locations`.location_icon
                          FROM
                            hat_asset_locations,
                            ham_maint_sites
                          WHERE hat_asset_locations.deleted = 0 
                          AND hat_asset_locations.`ham_maint_sites_id` = `ham_maint_sites`.id ";
          
        if (isset($_REQUEST['site_id'])&&$_REQUEST['site_id']!="undefined"&&$_REQUEST['site_id']!="") {
          //如果限制SITE_ID，只列出当前Site下的地点
          $sel_sub_location .= " AND hat_asset_locations.`ham_maint_sites_id` = '".$_REQUEST['site_id']."'";
        } else {
         //如果没有限制SITE_ID则，取出当前业务框架下的所有地点+所有没有Site的地点
          $sel_sub_location .= " AND (hat_asset_locations.`ham_maint_sites_id`= '' OR hat_asset_locations.`ham_maint_sites_id` is NULL OR  ham_maint_sites.`haa_frameworks_id`='".$current_framework."')";
        }

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel_sub_location .= " AND parent_location_id = '".$_REQUEST['id']."'";
        } else {
            $sel_sub_location .= " AND (parent_location_id = '' OR parent_location_id IS NULL)";
        }

        $sel_sub_location .= " ORDER BY name";
    //echo $sel_sub_location;
    $bean_locations =  $db-> query($sel_sub_location);

    while ( $location = $db->fetchByAssoc($bean_locations) ) {
           $txt_jason .='{id:"'.$location['id'].'",';
           $txt_jason .='img:"'.$location['location_icon'].'",';
           $txt_jason .='code:"'.$location['name'].'",';
           $txt_jason .='desc:"'.$location['location_title'].'",';
            $txt_jason .='type:"current_using_org_none"},';
    }

    if (isset($_REQUEST['id'])) {
      $account_id = $_SESSION['query_id'];
        $sel_sub_asset ="SELECT
                          hat_assets.id,
                          hat_assets.name,
                          hat_assets.asset_desc,
                          hat_assets.asset_icon,
                          hat_assets.asset_status,
                          hat_assets.enable_linear,
                          hat_assets.enable_it_rack,
                          hat_assets.enable_it_ports
                        FROM
                          hat_assets
                        LEFT JOIN
                          accounts
                        ON (accounts.deleted=0
                          AND accounts.id = hat_assets.`using_org_id`
                          AND accounts.id ='".$account_id."')
                        ,
                        hat_asset_locations_hat_assets_c
                        WHERE
                          hat_assets.`deleted` = 0
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                        AND hat_asset_locations_hat_assets_c.deleted = 0
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida ='".$_REQUEST['id']."' "."
                        AND hat_assets.asset_status != 'Discard'
                        AND hat_assets.asset_status IN ('PreAssigned','Idle','Stocked')
                        AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";
  }
        /*$sel_sub_asset ="SELECT
                          hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status
                        FROM
                          hat_assets
                        LEFT JOIN
                          accounts
                        ON (accounts.deleted=0
                          AND accounts.id = hat_assets.`using_org_id`
                          AND accounts.id ='".$_REQUEST['query_id']."')
                        WHERE hat_assets.`deleted` = 0
                            AND hat_assets.asset_status != 'Discard'
                            AND hat_assets.asset_status IN ('PreAssigned','Idle','Stocked')
                            AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";*/
        //echo $sel_sub_asset;


}

if ($_REQUEST['type']=="unallocated") {
    //unallocated 显示当机柜或者资产的状态为“空闲/可用”或“空闲/库存”或机柜为允许散U分配
    //先加载所有的Location列表
        $sel_sub_location ="SELECT
                            `hat_asset_locations`.id,
                            `hat_asset_locations`.name,
                            `hat_asset_locations`.location_title,
                            `hat_asset_locations`.location_icon
                          FROM
                            hat_asset_locations,
                            ham_maint_sites
                          WHERE hat_asset_locations.deleted = 0 
                          AND hat_asset_locations.`ham_maint_sites_id` = `ham_maint_sites`.id ";
          //SQL Statement没有加载完成，下面继续拼接SQL,包括以下可能的场景
          //ham_maint_sites_id
          //haa_frameworks_id
          //parent_location_id
        if (isset($_REQUEST['site_id'])&&$_REQUEST['site_id']!="undefined"&&$_REQUEST['site_id']!="") {
          //如果限制SITE_ID，只列出当前Site下的地点
          $sel_sub_location .= " AND hat_asset_locations.`ham_maint_sites_id` = '".$_REQUEST['site_id']."'";
        } else {
         //如果没有限制SITE_ID则，取出当前业务框架下的所有地点+所有没有Site的地点
          $sel_sub_location .= " AND (hat_asset_locations.`ham_maint_sites_id`= '' OR hat_asset_locations.`ham_maint_sites_id` is NULL OR  ham_maint_sites.`haa_frameworks_id`='".$current_framework."')";
        }

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel_sub_location .= " AND parent_location_id = '".$_REQUEST['id']."'";
        } else {
            $sel_sub_location .= " AND (parent_location_id = '' OR parent_location_id IS NULL)";
        }

        $sel_sub_location .= " ORDER BY name";
    //echo $sel_sub_location;
    $bean_locations =  $db-> query($sel_sub_location);

    while ( $location = $db->fetchByAssoc($bean_locations) ) {
           $txt_jason .='{id:"'.$location['id'].'",';
           $txt_jason .='img:"'.$location['location_icon'].'",';
           $txt_jason .='code:"'.$location['name'].'",';
           $txt_jason .='desc:"'.$location['location_title'].'",';
          // $txt_jason .='status_tag:"color_asset_status_'.$asset['asset_status'].'",';
          // $txt_jason .='status:"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
           //$txt_jason .='query_id:"'.$_REQUEST['query_id'].'",';
            $txt_jason .='type:"unallocated"},';
    }

    if (isset($_REQUEST['id'])) {
      
        $sel_sub_asset ="SELECT
                          hat_assets.id,
                          hat_assets.name,
                          hat_assets.asset_desc,
                          hat_assets.asset_icon,
                          hat_assets.asset_status,
                          hat_assets.enable_linear,
                          hat_assets.enable_it_rack,
                          hat_assets.enable_it_ports
                        FROM
                          hat_assets
                        LEFT JOIN hit_racks ON (
                          hit_racks.`hat_assets_id` = hat_assets.id
                          AND hit_racks.`deleted` = 0
                        ),
                        hat_asset_locations_hat_assets_c
                        WHERE
                          hat_assets.`deleted` = 0
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                        AND hat_asset_locations_hat_assets_c.deleted = 0
                        AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida = '".$_REQUEST['id']."' "."
                        AND hat_assets.asset_status != 'Discard'
                        AND (
                          hat_assets.asset_status IN ('Idle', 'Stocked')
                          OR hat_assets.id IN (
                            SELECT
                              hr.hat_assets_id
                            FROM
                              hit_racks hr
                            WHERE
                              hr.enable_partial_allocation = 1
                            AND hr.deleted = 0
                          )
                        )
                        AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";
  }


}
if ($_REQUEST['type']=="current_owning_org") {
    //current_owning_org 
    //echo $_REQUEST['query_id'];
    if(isset($_REQUEST['query_id']) && $_REQUEST['query_id'] != ''){
      $_SESSION['query_id'] = $_REQUEST['query_id'];
    }else{
      //echo "abcd ".$_REQUEST['query_id'];
    }  
    //$_REQUEST['query_id'] = $_REQUEST['query_id'];
    //先加载所有的Location列表
        $sel_sub_location ="SELECT
                            `hat_asset_locations`.id,
                            `hat_asset_locations`.name,
                            `hat_asset_locations`.location_title,
                            `hat_asset_locations`.location_icon
                          FROM
                            hat_asset_locations,
                            ham_maint_sites
                          WHERE hat_asset_locations.deleted = 0 
                          AND hat_asset_locations.`ham_maint_sites_id` = `ham_maint_sites`.id ";
          //SQL Statement没有加载完成，下面继续拼接SQL,包括以下可能的场景
          //ham_maint_sites_id
          //haa_frameworks_id
          //parent_location_id
        if (isset($_REQUEST['site_id'])&&$_REQUEST['site_id']!="undefined"&&$_REQUEST['site_id']!="") {
          //如果限制SITE_ID，只列出当前Site下的地点
          $sel_sub_location .= " AND hat_asset_locations.`ham_maint_sites_id` = '".$_REQUEST['site_id']."'";
        } else {
         //如果没有限制SITE_ID则，取出当前业务框架下的所有地点+所有没有Site的地点
          $sel_sub_location .= " AND (hat_asset_locations.`ham_maint_sites_id`= '' OR hat_asset_locations.`ham_maint_sites_id` is NULL OR  ham_maint_sites.`haa_frameworks_id`='".$current_framework."')";
        }

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel_sub_location .= " AND parent_location_id = '".$_REQUEST['id']."'";
        } else {
            $sel_sub_location .= " AND (parent_location_id = '' OR parent_location_id IS NULL)";
        }

        $sel_sub_location .= " ORDER BY name";
    //echo $sel_sub_location;
    $bean_locations =  $db-> query($sel_sub_location);

    while ( $location = $db->fetchByAssoc($bean_locations) ) {
           $txt_jason .='{id:"'.$location['id'].'",';
           $txt_jason .='img:"'.$location['location_icon'].'",';
           $txt_jason .='code:"'.$location['name'].'",';
           $txt_jason .='desc:"'.$location['location_title'].'",';
          // $txt_jason .='status_tag:"color_asset_status_'.$asset['asset_status'].'",';
          // $txt_jason .='status:"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
           //$txt_jason .='query_id:"'.$_REQUEST['query_id'].'",';
            $txt_jason .='type:"current_owning_org"},';
    }

    if (isset($_REQUEST['id'])) {
        
        $account_id = $_SESSION['query_id'];

        $sel_sub_asset ="SELECT
                          hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status,hat_assets.enable_linear,hat_assets.enable_it_rack,hat_assets.enable_it_ports
                        FROM
                          hat_assets,
                          accounts,
                          hat_asset_locations_hat_assets_c
                        WHERE hat_assets.`deleted` = 0
                          AND hat_assets.asset_status != 'Discard'
                          AND accounts.`deleted` = 0
                          AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
                          AND hat_asset_locations_hat_assets_c.deleted = 0
                          AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida ='".$_REQUEST['id']."' "."
                          AND accounts.id = hat_assets.`owning_org_id`
                                                    AND accounts.id='".$account_id."'
                            AND ".$current_mode_sql.$current_site_sql.$where_sql. " ORDER by hat_assets.name ASC";
        /*if($_REQUEST['id'] == 'a26e1f5b-7ed9-fede-9a8b-5868c24c6b3e'){
          echo $sel_sub_asset;
          echo($_SESSION['query_id']);
        }*/

      
    }



}

//echo $sel_sub_asset;
?>

