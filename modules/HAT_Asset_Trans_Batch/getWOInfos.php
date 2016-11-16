<?php


if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

if (empty ($_REQUEST['ham_wo_id'])) {
	die('Not A Valid ID');
}

global $db;

$wo_sql = "SELECT 
				  h.date_actual_start,
				  h.date_target_finish
			FROM
			      ham_wo h 
			WHERE h.deleted=0 
			AND   h.id ='" . $_GET['ham_wo_id'] . "'";
$wo_result = $db->query($wo_sql);

while ($wo_row = $db->fetchByAssoc($wo_result)) {
	$wo_line_data = json_encode($wo_row);
	echo $wo_line_data;
}
exit ();
?>