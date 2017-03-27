<?php
global $db;
global $mod_strings, $app_strings, $app_list_strings,$dictionary;

//print_r ($_POST);

$select_from = "SELECT hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon, hat_assets.asset_status, hit_racks.id rack_id,hat_assets.enable_linear,
                          hat_assets.enable_it_rack,
                          hat_assets.enable_it_ports
          FROM hat_assets LEFT JOIN
                        hit_racks ON (hit_racks.`deleted`=0 AND hit_racks.`hat_assets_id`=hat_assets.id)";

if (isset($_SESSION["current_framework"]) && $_SESSION["current_framework"]!="") {
  $where_framework = " AND hat_assets.haa_frameworks_id = '".$_SESSION["current_framework"]."'";
}else {
  $where_framework = "";
}

/*资产状态*/
if (!empty($_POST['asset_status'])) {
  $where_status  = " AND hat_assets.asset_status ='". $_POST['asset_status']."'";
}else{
  $where_status  = "";
}

/*资产名称*/
if (!empty($_POST['asset_name'])) {
  $where_asset_name = " AND hat_assets.name LIKE '%". $_POST['asset_name']."%'";
} else {
  $where_asset_name ="";
}

/*SN*/
if (!empty($_POST['serial_number'])) {
  $where_asset_sn = " AND hat_assets.serial_number LIKE '%". $_POST['serial_number']."%'";
} else {
  $where_asset_sn ="";
}


/*地点*/
if (!empty($_POST['site_select'])) {
  $where_site_select = " AND EXISTS (SELECT 1
    FROM
      hat_asset_locations_hat_assets_c halhac, hat_asset_locations hal, ham_maint_sites hms 
    WHERE hal.`deleted` = 0 AND hms.`deleted` = 0 
      AND hal.`ham_maint_sites_id` = hms.`id` 
      AND halhac.`hat_asset_locations_hat_assetshat_asset_locations_ida`=hal.`id`
      AND halhac.hat_asset_locations_hat_assetshat_assets_idb = hat_assets.id
      AND halhac.`deleted`=0 AND hms.id = '".$_POST['site_select']."')";
}else{
  $where_site_select="";
}
/*
//资产使用组织
if (!empty($_POST['using_org_name'])) {
  $join_using_org = " JOIN accounts account_u ON (hat_assets.using_org_id = account_u.id AND account_u.name like '%".$_POST['using_org_name']."%')";
}else{
  $join_using_org="";
}
//资产使用组织id
if (!empty($_POST['target_using_org_id'])&&$_POST['target_using_org_id']!="undefined") {
  $where_use_org = " AND hat_assets.using_org_id = '". $_POST['target_using_org_id']."'";
} else {
  $where_use_org ="";
}*/
/*
//资产所属组织
if (!empty($_POST['owning_org_name'])) {
  $join_owning_org = " JOIN accounts account_o ON (hat_assets.owning_org_id = account_o.id AND account_o.name like '%".$_POST['owning_org_name']."%')";
}else{
  $join_owning_org="";
}
//add by liu
//资产所属组织id
if (!empty($_POST['current_owning_org_id'])&&$_POST['current_owning_org_id']!="undefined") {
  $where_own_org = " AND hat_assets.owning_org_id = '". $_POST['current_owning_org_id']."'";
} else {
  $where_own_org ="AND 1=1 ";
}*/
//update by liu
/*资产使用组织*/
$where_using_org ="";
if (!empty($_POST['using_org_name'])||(!empty($_POST['target_using_org_id'])&&$_POST['target_using_org_id']!="undefined")) {
  $join_using_org = " LEFT JOIN accounts account_u ON (hat_assets.using_org_id = account_u.id )";
  if (!empty($_POST['using_org_name'])) {
    $where_using_org .= " AND account_u.name like '%".$_POST['using_org_name']."%'";
  }
  if (!empty($_POST['target_using_org_id'])&&$_POST['target_using_org_id']!="undefined"&&($_POST['defualt_list']=="current_using_org"||$_POST['defualt_list']=="current_using_org_none")) {
    $where_using_org .= " AND account_u.id = '".$_POST['target_using_org_id']."'";
  }
}else{
  $join_using_org="";
  $where_using_org="";
}
/*资产所属组织*/
$where_owning_org ="";
if (!empty($_POST['owning_org_name'])||($_POST['defualt_list']=="current_owning_org")) {
  $join_owning_org = " LEFT JOIN accounts account_o ON (hat_assets.owning_org_id = account_o.id )";
  if (!empty($_POST['owning_org_name'])) {
    $where_owning_org .= " AND account_o.name like '%".$_POST['owning_org_name']."%'";
  }
  if (!empty($_POST['current_owning_org_id']) && 
    $_POST['current_owning_org_id']!="undefined" &&
    ($_POST['defualt_list']=="current_owning_org")  ) {
    $where_owning_org .= " AND account_o.id = '".$_POST['current_owning_org_id']."'";
  }
}else{
  $join_owning_org="";
  $where_owning_org="";
}

//add by liu
if (isset($_POST['current_mode'])) {
  if($_POST['current_mode']=="rack"||$_POST['current_mode']=="rackposition") {
    $current_mode_sql = " AND hat_assets.enable_it_rack = 1 ";
  } elseif ($_POST['current_mode']=="it") {
    $current_mode_sql = " AND hat_assets.enable_it_ports = 1 ";
  }elseif ($_POST['current_mode']=="rackasset") {
    $current_mode_sql = " AND (hat_assets.enable_it_rack = 1 OR hat_assets.enable_linear = 1)";
  }
}else{
  $current_mode_sql = "";
}
//add by liu
if (isset($_POST['asset_type'])) {
  if($_POST['asset_type']=="IT_PORT") {
    $where_asset_type = " AND hat_assets.enable_it_ports = 1 ";
  } elseif ($_POST['asset_type']=="RACK_ALL") {
    $where_asset_type = " AND hat_assets.enable_it_rack = 1 ";
  }elseif ($_POST['asset_type']=="RACK_NOT_ENABLE_PARTIAL") {
    $where_asset_type = " AND hat_assets.enable_it_rack = 1 
                          AND hit_racks.enable_partial_allocation = 0";
  }elseif ($_POST['asset_type']=="RACK_ENABLE_PARTIAL") {
    $where_asset_type = " AND hat_assets.enable_it_rack = 1 
                          AND hit_racks.enable_partial_allocation = 1";
  }
}else{
  $where_asset_type = "";
}
//add by liu
if (isset($_POST['defualt_list'])&&$_POST['defualt_list']!="none") {
  $where_sql = " AND NOT EXISTS (
                                SELECT
                                1
                                FROM
                                hit_rack_allocations
                                WHERE
                                hit_rack_allocations.`deleted` = 0
                                AND hit_rack_allocations.`hat_assets_id` = hat_assets.id
                                )";
  if($_POST['defualt_list']=="current_using_org_none") {
    $where_sql .= " AND hat_assets.asset_status IN ('PreAssigned','Idle','Stocked') ";
  } 
  if ($_POST['defualt_list']=="wo_ip_trans"&&!empty($_POST['wo_id'])) {
    $where_sql .= " AND hat_assets.id IN 
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
                                AND hit_ip_trans_batch.`source_wo_id`='".$_POST['wo_id']."')";
  }
  if ($_POST['defualt_list']=="unallocated") {
    $where_sql .=" AND (
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
                        )";
  }
  if ($_POST['defualt_list']=="wo_asset_trans"&&!empty($_POST['wo_id'])) {
    $where_sql .= " AND hat_assets.id IN 
                          (SELECT 
                          hat_asset_trans.asset_id 
                          FROM
                          hat_asset_trans,
                          hat_asset_trans_batch 
                          WHERE hat_asset_trans.`deleted` = 0 
                          AND hat_asset_trans_batch.`deleted` = 0 
                           AND hat_asset_trans_batch.`deleted` = 0
                          AND hat_asset_trans.batch_id = hat_asset_trans_batch.id
                          AND hat_asset_trans_batch.source_wo_id='".$_POST['wo_id']."'
                          AND hat_asset_trans_batch.asset_trans_status != 'DRAFT'
                          AND hat_asset_trans_batch.asset_trans_status != 'CANCELED')";
  }
}else{
  $where_sql = "";
}

$where_limit  = " LIMIT 0,200";
//echo $select_from.$where_status.$where_asset_name.$where_site_select;
//
$SQL_Query = $select_from.$join_using_org.$join_owning_org." WHERE hat_assets.deleted=0 ".$where_status.$where_asset_name.$where_asset_sn.$where_framework.$where_site_select.$where_owning_org.$where_using_org.$where_asset_type.$where_sql.$current_mode_sql.$where_limit;

//echo $SQL_Query;




$txt_jason = "";

if (isset($SQL_Query)) {
    $bean_assets = $db->query($SQL_Query); //无如是Location还是asset来源，都可以显示子资产


        while ( $asset = $db->fetchByAssoc($bean_assets) ) {

           $txt_jason .='{"id":"'.$asset['id'].'",';
           //$txt_jason .='name:"<i class=\'zmdi '.$asset['asset_icon'].' icon-hc-lg \'></i> <span class=\'treeview_asset\'>'.$asset['name'].'</span>: '.$asset['asset_desc'].'",';
           $txt_jason .='"img":"'.$asset['asset_icon'].'",';
           $txt_jason .='"code":'.json_encode($asset['name']).',';
           $txt_jason .='"desc":'.json_encode($asset['asset_desc']).',';

           if (isset($asset['rack_id'])) {
            $txt_jason .='"rack_id":"'.$asset['rack_id'].'",';
           }

           $txt_jason .='"status_tag":"color_asset_status_'.$asset['asset_status'].'",';
           $txt_jason .='"status":"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
           $txt_jason .='"type":"asset"},';
        }
}

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);

exit();