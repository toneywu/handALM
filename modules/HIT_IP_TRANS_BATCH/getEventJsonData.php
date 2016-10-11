<?php


if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

if (empty ($_REQUEST['hat_eventtype_id'])) {
	die('Not A Valid ID');
}

global $db;

$event_sql = "SELECT 
				  h.change_ip_subnets,
				  h.change_associated_ip,
				  h.change_gateway,
				  h.change_bandwidth_type,
				  h.change_port,
				  h.change_speed_limit,
				  h.change_asset,
				  h.change_cabinet,
				  h.change_monitoring,
				  h.change_channel_num,
				  h.change_channel_content,h.change_mrtg_link
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