<?php

    $wo_id = $_REQUEST['id'];
    //echo($wo_id);
    global $db;
    $i = 0;
	if($wo_id != ""){
		//不能用= NULL
		$sql="SELECT
					woop.id woop_id
				FROM
					ham_woop woop
				WHERE
					woop.deleted = 0
				AND (
					woop.work_center_people_id = ''
					OR woop.work_center_people_id IS NULL
				)
				AND woop.ham_wo_id = '".$wo_id."'";
    	$result=$db->query($sql);
		while($row=$db->fetchByAssoc($result)){
			if ($row['woop_id'] != "") {
				$woop_ids[$i] =$row['woop_id'];
			}
			$i = $i+1;
        }
        echo json_encode($woop_ids);
    }
    else{
    	echo 0;
    }
 

