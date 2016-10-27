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

$sql = "SELECT 
			  h.id asset_id,
			  h.asset_number asset
			  ,a.name 
			  ,own_org.id    target_owning_org_id
			  ,own_org.name  target_owning_org 
			  ,using_org.id   target_using_org_id
			  ,using_org.name target_using_org
			FROM
			  hat_assets h 
			  LEFT JOIN aos_products a ON (a.id=h.aos_products_id AND   a.deleted='0')
			  LEFT JOIN hat_asset_locations_hat_assets_c c ON (h.id=c.hat_asset_locations_hat_assetshat_assets_idb and c.deleted='0')
			  LEFT JOIN hat_asset_locations l ON (l.id=c.hat_asset_locations_hat_assetshat_asset_locations_ida AND   l.deleted='0')
			  LEFT JOIN accounts own_org ON (own_org.id=h.owning_org_id)
			  LEFT JOIN accounts using_org ON (using_org.id=h.using_org_id)
			  WHERE   h.deleted=0 and h.id='" . $current_id . "'";
if(!empty($current_id)){
	$result = $db->query($sql);
	while ($row = $db->fetchByAssoc($result)) {
		$line_data = json_encode($row);
		echo $line_data;
	}
}

?>
