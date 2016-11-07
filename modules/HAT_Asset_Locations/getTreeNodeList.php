<?php
/************************************************************
*本文件被modules/HAT_Asset_Locations/getTreeNode.php调用，
*用于处理查询的业务场景
*当REQUST(defualt_list)不为空，或不为NONE时进行默认查询的处理
* ************************************************************/
$current_mode_sql="1=1";
if (isset($_REQUEST['current_mode'])) {
    if($_REQUEST['current_mode']=="rack"||$_REQUEST['current_mode']=="rackposition") {
        $current_mode_sql = "hat_assets.enable_it_rack = 1 ";
    } elseif ($_REQUEST['current_mode']=="it") {
        $current_mode_sql = "hat_assets.enable_it_ports = 1 ";
    }
}

if ($_REQUEST['type']=="rack" && isset($_REQUEST['wo_id'])) {
    //wo_asset_trans 显示当前工作单的所有资产事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT 
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status
                        FROM
                          hat_assets
                        WHERE hat_assets.`deleted`=0
                          AND hat_assets.id ='".$_REQUEST['wo_id']."'";

                        //echo $sel_sub_asset;
}


if ($_REQUEST['type']=="wo_asset_trans" && isset($_REQUEST['wo_id'])) {
    //wo_asset_trans 显示当前工作单的所有资产事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT DISTINCT
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status
                        FROM
                          hat_assets,
                          hat_asset_trans,
                          hat_asset_trans_batch
                        WHERE hat_asset_trans.`deleted` = 0
                          AND hat_asset_trans_batch.`deleted` = 0
                          AND hat_assets.`deleted`=0
                          AND hat_asset_trans.`batch_id` = hat_asset_trans_batch.`id`
                          AND hat_assets.id = hat_asset_trans.`asset_id`
                          AND hat_asset_trans_batch.`source_wo_id`='".$_REQUEST['wo_id']."'
                          AND hat_asset_trans_batch.`asset_trans_status` != 'DRAFT'
                          AND hat_asset_trans_batch.`asset_trans_status` != 'CANCELED'
                          AND ".$current_mode_sql. " ORDER by hat_assets.name ASC";
                         //
}

if ($_REQUEST['type']=="wo_ip_trans" && isset($_REQUEST['wo_id'])) {
    //wo_ip_trans 显示当前工作单的所有网络资源事务处理行中出现的内容

    //因为存在多个资产事务处理行处理了同一个资产的情况（比如不同资产事务单），因此在结果中需要DISTINCT
        $sel_sub_asset ="SELECT DISTINCT 
                          hat_assets.id, hat_assets.name, hat_assets.asset_desc, hat_assets.asset_icon, hat_assets.asset_status 
                        FROM
                          hat_assets 
                        WHERE hat_assets.`deleted` = 0 
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
                            AND hit_ip_trans_batch.`source_wo_id`='".$_REQUEST['wo_id']."'
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
                            AND hit_ip_trans_batch.`source_wo_id`='".$_REQUEST['wo_id']."'
                            )
                            AND ".$current_mode_sql. " ORDER by hat_assets.name ASC";
}

//echo $sel_sub_asset;

?>

