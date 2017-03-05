<?php
$job_strings[] = 'CreateRevenuesFromContract';
function CreateRevenuesFromContract()
{
	require_once('modules/AOS_Contracts/createRevenueFromContract.php');
	global $db;
	$sql = "SELECT
	act.id
	FROM
	aos_contracts act
	WHERE 1=1
	and act.deleted=0
	and	act.STATUS  IN (
	'Signed'
	)";

	$result = $db->query($sql);

	while ($row = $db->fetchByAssoc($result)) {
		createRevenueFromContract($row['id'],0,15);
	}

	return true;
}
?>