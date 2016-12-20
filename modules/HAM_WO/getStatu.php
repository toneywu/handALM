<?php
//Add by zengchen 20161213
	error_reporting(E_ALL);

	if (!defined('sugarEntry') || !sugarEntry)
    	die('Not A Valid Entry Point');
	$wo_id=$_POST['wo_id'];
	$module=$_POST['module_name'];
	global $db;
	$sql = "SELECT ha.asset_trans_status FROM ham_woop hw,".$module." ha where hw.id=ha.source_woop_id AND hw.deleted=0 AND ha.deleted=0 AND hw.id='".$wo_id."'";
	$result=$db->query($sql);
	while ($row=$db->fetchByAssoc($result)) {
		$res=$row['asset_trans_status'];
	}
	echo $res;
	//End add 20161213
?>