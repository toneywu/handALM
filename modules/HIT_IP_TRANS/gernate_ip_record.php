<?php
/*
 * Created on 2016-10-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
header("Content-type: text/html; charset=UTF-8");
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
global $db;
$obj = json_decode($_GET['idArray']);
$current_id = $_GET['record'];

$sql = "				SELECT 
						  NULL id,
						  NULL hat_asset_name,
						  NULL hat_assets_id,
						  line.name hit_ip_subnets,
						  line.id hit_ip_subnets_id,
						  header.name parent_ip,
						  NULL associated_ip,
						  line.ip_netmask mask,
						  NULL bandwidth_type,
						  NULL PORT,
						  NULL speed_limit,
						  NULL gateway,
						  NULL monitoring,
						  NULL hat_assets_cabinet_id,
						  NULL hat_assets_cabinet,
						  NULL channel_content,
						  NULL channel_num,
						  NULL ip_netmask,
						  line.ip_lowest+'~'+ line.ip_highest associated_ip,
						  NULL mrtg_link,
						  NULL access_assets_id,
						  NULL access_assets_name,
						  '' source_ref,
						  NULL date_entered,
						  NULL access_assets_backup_id,
						  NULL access_assets_backup_name,
						  NULL STATUS,
						  NULL port_backup,
						  NULL monitoring_backup,
						  NULL channel_content_backup,
						  NULL channel_num_backup,
						  NULL date_start,
						  NULL date_end,
						  NULL STATUS,
						  NULL enable_action,
						  NULL broadband_type 
						FROM
						  hit_ip_subnets line,
						  hit_ip  header 
						WHERE line.parent_hit_ip_id = header.id
						  AND line.deleted = 0 
						  AND header.deleted = 0 
						  and line.id='" . $current_id . "'";

if(!empty($current_id)){
	$result = $db->query($sql);
	while ($row = $db->fetchByAssoc($result)) {
		$line_data = json_encode($row);
		echo $line_data;
	}
}

?>
