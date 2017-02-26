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
print json_encode($returnData);

?>