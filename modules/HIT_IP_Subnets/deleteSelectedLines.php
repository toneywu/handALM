<?php
	$ids = $_REQUEST["line_ids"];
	global $db;
	$sql = 'update hit_ip_subnets set deleted = 1 where id in(';
	foreach ($ids as $key => $value) {
		$sql .= '"'.$value.'",';
	}
	$sql .= '"0")';
	echo $db->query($sql);
?>