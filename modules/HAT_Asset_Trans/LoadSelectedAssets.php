<?php



header("Content-type: text/html; charset=UTF-8");
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
global $db;

$idStr= '"'.join('","',$_REQUEST['idArray']).'"';

$sql = "SELECT 
			   h.id asset_id
			  ,h.name asset,a.name
			  ,h.asset_desc
			  ,h.asset_status       current_asset_status
			  ,own_org.id          	current_owning_org_id
			  ,own_org.name  		current_owning_org 
			  ,using_org.id   		current_using_org_id
			  ,using_org.name 		current_using_org
			  ,parent_asset.name 		current_parent_asset
			  ,parent_asset.id 		current_parent_asset_id
			  ,owning_person_t.last_name 	current_owning_person
			  ,owning_person_t.id 		current_owning_person_id
			  ,h.owning_person_desc 	current_owning_person_desc
			  ,using_person_t.id  		current_using_person_id
			  ,using_person_t.last_name  	current_using_person
			  ,h.using_person_desc  	current_using_person_desc
			  ,l.name 			current_location
			  ,l.id 			current_location_id
			  ,h.location_desc 		current_location_desc
			FROM
			  hat_assets h 
			  LEFT JOIN aos_products a ON (a.id=h.aos_products_id AND   a.deleted=0)
			  LEFT JOIN hat_asset_locations_hat_assets_c c ON (h.id=c.hat_asset_locations_hat_assetshat_assets_idb AND c.deleted='0')
			  LEFT JOIN hat_asset_locations l ON (l.id=c.hat_asset_locations_hat_assetshat_asset_locations_ida AND   l.deleted='0')
			  LEFT JOIN accounts own_org ON (own_org.id=h.owning_org_id)
			  LEFT JOIN accounts using_org ON (using_org.id=h.using_org_id)
			  LEFT JOIN hat_assets parent_asset ON (parent_asset.id = h.parent_asset_id AND parent_asset.deleted = 0)
			  LEFT JOIN contacts owning_person_t  ON (owning_person_t.id = h.owning_person_id AND owning_person_t.deleted = 0) 
			  LEFT JOIN contacts using_person_t  ON (using_person_t.id = h.using_person_id AND using_person_t.deleted = 0)  
			  WHERE   h.deleted=0 and h.id in (" . $idStr . ")";

//echo $sql;


	$result = $db->query($sql);
	$rows = array();
	while ($row = $db->fetchByAssoc($result)) {
		$rows[] = $row;//str_replace("null",'""',$row);
	}
	print json_encode($rows);

?>