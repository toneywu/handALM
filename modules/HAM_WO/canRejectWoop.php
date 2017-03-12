<?php
//Add by liu 
	error_reporting(E_ALL);
	if (!defined('sugarEntry') || !sugarEntry)
    	die('Not A Valid Entry Point');

	$wo_id=$_REQUEST['wo_id'];
    //echo($wo_id);
    $can_reject = 0;
	global $db,$current_user;
	$sql = "SELECT
				1 can_reject
			FROM
				ham_wo hw
			WHERE
				hw.id = '".$wo_id."'
			AND EXISTS (
				SELECT
					1
				FROM
					ham_woop woop,
					ham_work_center_people wcp,
					users_cstm usr
				WHERE
					woop.deleted = 0
				AND woop.ham_wo_id = hw.id
				AND woop.work_center_people_id = wcp.id
				AND usr.contact_id_c = wcp.contact_id
				AND woop.woop_status = 'APPROVED'
				AND usr.id_c = '".$current_user->id."'
			)";

	$result=$db->query($sql);
	while($row=$db->fetchByAssoc($result)){
		if ($row['can_reject'] == "1") {
			$can_reject = 1;
		}else{
			$can_reject = 0;
		}	
    }
    echo($can_reject);
	
?>