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

$sql = "SELECT   null id
							        ,a.name hat_asset_name,a.id hat_assets_id
							        ,s.name hit_ip_subnets
							        ,s.id   hit_ip_subnets_id
							        ,hi.name parent_ip
							        ,hat.associated_ip
							        ,null mask
							        ,hat.bandwidth_type
							        ,hat.port
							        ,hat.speed_limit
							        ,hat.gateway
									,hat.monitoring
									,hat.hat_assets_cabinet_id
									,b.name hat_assets_cabinet
									,hat.channel_content
									,hat.channel_num
									,s.ip_netmask
									,s.ip_lowest+'~'+ s.ip_highest associated_ip
									,hat.mrtg_link
									,hat.access_assets_id
									,c.name access_assets_name 	
									,null source_ref,
									hat.date_entered,
									hat.access_assets_backup_id,
									d.name access_assets_backup_name
									,hat.status,hat.port_backup
									,hat.monitoring_backup
									,hat.channel_content_backup
									,hat.channel_num_backup
									,ifnull(hat.date_start,'') date_start
									,hat.date_end,hat.status,hat.enable_action,hat.broadband_type
							FROM   hit_ip_allocations hat
							LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
							LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
							LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
							LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
							LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
							LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
							WHERE hat.deleted=0 and hat.id='" . $current_id . "'";



//echo json_encode($_REQUEST['idArray']);
//echo '<script>console.log("'.json_encode($_REQUEST['idArray']).'")</script>';
//echo $current_id;
if(!empty($current_id)){
	//$allocBean = BeanFactory::getBean("HIT_IP_Allocations",$current_id);
	$result = $db->query($sql);
	while ($row = $db->fetchByAssoc($result)) {
		$line_data = json_encode($row);
		//$html .= "<script>var lineDataTemp=" . $line_data . ";</script>";
		//$html .= "<script>lineData=" . $line_data . ";</script>";
		//$html .= "<script>insertLineData(" . $line_data . ");</script>";
		echo $line_data;
	}
}

?>
