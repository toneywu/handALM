<?php

    $wo_id = $_REQUEST['wo_id'];
    //echo($product_id);
    global $db;
	if($wo_id != ""){//
		
		$sql="SELECT
					1 not_completed
				FROM
					ham_wo hw
				WHERE
					hw.id = '".$wo_id."'
				AND EXISTS (
					SELECT
						1
					FROM
						ham_woop woop
					WHERE
						woop.deleted = 0
					AND woop.ham_wo_id = hw.id
					AND woop.woop_status != 'COMPLETED'
				)";
    	$result=$db->query($sql);
		while($row=$db->fetchByAssoc($result)){
			if ($row['not_completed'] == "1") {
				echo 1;
			}else{
				echo 0;
			}
			
        }
    }
    else{
    	echo 1;
    }
 

