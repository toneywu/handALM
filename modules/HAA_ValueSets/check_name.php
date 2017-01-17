<?php

    $data=$_POST['name'];
    $record=$_POST['record'];
    global $db;
	if($record !=""){//如果不是新增（即如果是编辑已有记录）
		
		$sql="SELECT h.`name`,COUNT(h.`name`) num
				FROM haa_valuesets h
				WHERE 1=1
				AND h.`name` = '".$data."'
				AND id <> '".$record."'
				GROUP BY h.`name`";
    	$result=$db->query($sql);
		while($row=$db->fetchByAssoc($result)){
			if ($row['num'] > 0) {
				echo 0;
		    }
		    else{
		    	echo 1;
		    }
        }
    }
    else{
    	$sql="SELECT h.`name`,COUNT(h.`name`) num
				FROM haa_valuesets h
				WHERE 1=1
				AND h.`name` = '".$data."'
				GROUP BY h.`name`";
        $result=$db->query($sql);
        //echo $sql;
		while($row=$db->fetchByAssoc($result)){
			if ($row['num'] > 0) {
				echo 0;
		    }
		    else{
		    	echo 1;
		    }
        }
    }
 

