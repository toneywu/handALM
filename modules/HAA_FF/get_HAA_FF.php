<?php
	error_reporting(E_ALL);
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');
	global $db;

	$code_tag=$_GET['code_tag'];
	if (preg_match("/[']|[\"]/", $code_tag)) {//简单防止sql注入
		$sql='';
	}else{
		$sql="SELECT NAME FROM haa_codes WHERE code_tag = '".$code_tag."'";
		$result=$db->query($sql);
		$array=array();
		while ($result_record = $db->fetchByAssoc($result)) {
			$array[]=$result_record["NAME"];
		}
		echo json_encode($array);
	}
?>