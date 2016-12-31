<?php
global $db;
global $mod_strings, $app_strings, $app_list_strings,$dictionary;

//print_r ($_POST);

$select_from = "SELECT hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon, hat_assets.asset_status, hit_racks.id rack_id
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

/*资产使用组织*/
if (!empty($_POST['using_org_name'])) {
  $join_using_org = " JOIN accounts account_u ON (hat_assets.using_org_id = account_u.id AND account_u.name like '%".$_POST['using_org_name']."%')";
}else{
  $join_using_org="";
}

/*资产使用组织*/
if (!empty($_POST['owning_org_name'])) {
  $join_owning_org = " JOIN accounts account_o ON (hat_assets.using_org_id = account_o.id AND account_o.name like '%".$_POST['owning_org_name']."%')";
}else{
  $join_owning_org="";
}


$where_limit  = " LIMIT 0,200";
//echo $select_from.$where_status.$where_asset_name.$where_site_select;
//
$SQL_Query = $select_from.$where_framework.$join_using_org.$join_owning_org." WHERE hat_assets.deleted=0 ".$where_status.$where_asset_name.$where_asset_sn.$where_site_select.$where_limit;

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