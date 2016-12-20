<?php
	error_reporting(E_ALL);
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');

	if (empty($_SESSION['current_framework']))
		die('Not A Valid Business Framewrok');

	global $db;

	$code_tag=$_GET['code_tag'];
	if (preg_match("/[']|[\"]/", $code_tag)) {//简单防止sql注入
		$sql='';
	}else{
		$sql="SELECT haa_codes.name FROM haa_codes WHERE haa_codes.`haa_frameworks_id` = '".$_SESSION['current_framework']."' and haa_codes.deleted=0 and haa_codes.code_tag = '".$code_tag."'";
		$result=$db->query($sql);
		$array=array();
		while ($result_record = $db->fetchByAssoc($result)) {
			$array[]=$result_record["name"];
		}
		echo json_encode($array);
		//echo $sql;
	}
?>