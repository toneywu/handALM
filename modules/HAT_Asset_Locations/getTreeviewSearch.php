<?php
global $db;
global $mod_strings, $app_strings, $app_list_strings,$dictionary;


$select_from = "SELECT
                        hat_assets.id, hat_assets.name, hat_assets.asset_desc,  hat_assets.asset_icon, hat_assets.asset_status, hit_racks.id rack_id
					FROM hat_assets LEFT JOIN
                        hit_racks ON (hit_racks.`deleted`=0 AND hit_racks.`hat_assets_id`=hat_assets.id)
                    WHERE hat_assets.deleted=0";

$where_status  = " AND HAT_Assets.asset_status ='". $_POST['asset_status']."'";

if (!empty($_POST['asset_name'])) {
	$where_asset_name = " AND HAT_Assets.name LIKE '". $_POST['asset_name']."'";
} else {
	$where_asset_name ="";
}

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

//echo $select_from.$where_status.$where_asset_name.$where_site_select;
//
$SQL_Query = $select_from.$where_status.$where_asset_name.$where_site_select;
$txt_jason = "";

if (isset($SQL_Query)) {
    $bean_assets = $db->query($SQL_Query); //无如是Location还是asset来源，都可以显示子资产
    //if(is_array($bean_assets)) {
        while ( $asset = $db->fetchByAssoc($bean_assets) ) {
           $txt_jason .='{"id":"'.$asset['id'].'",';
           //$txt_jason .='name:"<i class=\'zmdi '.$asset['asset_icon'].' icon-hc-lg \'></i> <span class=\'treeview_asset\'>'.$asset['name'].'</span>: '.$asset['asset_desc'].'",';
           $txt_jason .='"img":"'.$asset['asset_icon'].'",';
           $txt_jason .='"code":"'.$asset['name'].'",';
           $txt_jason .='"desc":"'.$asset['asset_desc'].'",';

           if (isset($asset['rack_id'])) {
            $txt_jason .='"rack_id":"'.$asset['rack_id'].'",';
           }

           $txt_jason .='"status_tag":"color_asset_status_'.$asset['asset_status'].'",';
           $txt_jason .='"status":"'.$app_list_strings['hat_asset_status_list'][$asset['asset_status']].'",';
           $txt_jason .='"type":"asset"},';
        }
    //}
}

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);

exit();