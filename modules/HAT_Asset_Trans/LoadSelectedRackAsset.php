<?php

header("Content-type: text/html; charset=UTF-8");
//header('Content-Type: application/json');
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $db;
$dataArray = $_REQUEST['idArray']['name_to_value_array'];
$returnData = array();
$data_ln='';
$assetId='';
foreach ($dataArray as $key => $value) {
	if(strpos($key, 'line_asset_id') !== false){
		$data_ln=substr($key,13);
		$assetId=$value;
	}
}
$returnData['ln']=$data_ln;
$sql = "select hr.enable_partial_allocation from hit_racks hr where hr.hat_assets_id = '".$assetId."'";

$result = $db->query($sql);
while ($row = $db->fetchByAssoc($result)) {
	$returnData['enable_partial_allocation']=$row['enable_partial_allocation'];
}

//add liu
$sql2 = "SELECT
				attribute10,
				attribute11,
				attribute12,
				cost_center_id,
				haa_codes. NAME cost_center
			FROM
				hat_assets
			LEFT JOIN haa_codes ON haa_codes.id = hat_assets.cost_center_id
			WHERE
				hat_assets.id = '".$assetId."'";
$result2 = $db->query($sql2);
while ($row2 = $db->fetchByAssoc($result2)) {
	$returnData['attribute10']=$row2['attribute10'];
	$returnData['attribute11']=$row2['attribute11'];
	$returnData['attribute12']=$row2['attribute12'];
	$returnData['cost_center_id']=$row2['cost_center_id'];
	$returnData['cost_center']=$row2['cost_center'];
}
print json_encode($returnData);

?>