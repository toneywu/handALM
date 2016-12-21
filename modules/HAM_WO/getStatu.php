<?php
//Add by zengchen 20161213
	error_reporting(E_ALL);
	if (!defined('sugarEntry') || !sugarEntry)
    	die('Not A Valid Entry Point');
	$wo_id=$_POST['wo_id'];
	$module=$_POST['module_name'];
	$courd=$_POST['leading'];
	global $db,$current_user;
	$res="";
	//查询状态
	$sql = "SELECT 
		ha.asset_trans_status 
	FROM 
		ham_woop hw,
		".$module." ha 
	WHERE 
		hw.id=ha.source_woop_id 
	AND hw.deleted=0 
	AND ha.deleted=0 
	AND hw.id='".$wo_id."'";
	$result=$db->query($sql);
	$row=$db->fetchByAssoc($result);
	$res['trans_status']=$row['asset_trans_status'];
	$sql_user="SELECT
		count(*) leadres
	FROM
		ham_work_center_people hwp,
		users_cstm a
	WHERE
		hwp.contact_id = a.contact_id_c 
	AND hwp.id = '1a45caf4-34ca-8300-5f85-57d75d26af72'
	AND a.id_c='".$current_user->id."'";
	$result=$db->query($sql_user);
	$row=$db->fetchByAssoc($result);
	$res['leader']=$row['leadres'];
	echo json_encode($res);
	//End add 20161213
?>