<?php


if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

if (empty ($_REQUEST['hat_eventtype_id'])) {
	die('Not A Valid ID');
}

global $db;

$event_sql = "SELECT 
				  h.change_owning_org,
				  h.change_using_org,
				  h.change_location,
				  h.change_owning_person,
				  h.change_rack_position
			FROM
			      hat_eventtype h 
			WHERE h.deleted=0 
			AND   h.id ='" . $_GET['hat_eventtype_id'] . "'";
$event_result = $db->query($event_sql);
while ($event_row = $db->fetchByAssoc($event_result)) {
	$event_line_data = json_encode($event_row);
	echo $event_line_data;
}
exit ();
?>