<?php
	$ids = $_REQUEST["line_ips"];
	$batch_id = $_REQUEST["batch_id"];
	global $db;
	$resultArr = array(
		'err_count'=>0,
		'err_id'=>'',
		);
	if(isset($batch_id)&&$batch_id!=''){
		$sql='SELECT
					count(his.id) err_ct
				FROM
					hit_ip_subnets his
				WHERE
					his.deleted = 1
				AND EXISTS (
					SELECT
						1
					FROM
						hit_ip_trans hit
					WHERE
						hit.hit_ip_subnets_id = his.id
					AND hit.deleted = 0
					AND hit.hit_ip_trans_batch_id = "'.$batch_id.'"
				)';
		$result = $db->query($sql);
	    while ($row = $db->fetchByAssoc($result)) {
	    	$resultArr['err_count']=$row['err_ct'];
	    }	
	    echo json_encode($resultArr);
	    return;
	}
	foreach ($ids as $key => $value) {
		$sql = 'select deleted from hit_ip_subnets where id ="'.$value.'"';
		$result = $db->query($sql);
		$deleted='';
	    while ($row = $db->fetchByAssoc($result)) {
	    	$deleted=$row['deleted'];
	    }
	    if($deleted=='1'){
	    	$resultArr['err_id'].=($key+1).',';
	    	$resultArr['err_count'] = $resultArr['err_count']+1;
	    }
	}
	echo json_encode($resultArr);
?>