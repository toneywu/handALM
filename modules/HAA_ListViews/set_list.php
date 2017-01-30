<?php

    //$data=$_POST['name'];
    //$record=$_POST['record'];
  
    $bean_v = BeanFactory::getBean('HAA_ListViews',$this->bean->id);
    $view_name = $bean_v->data_source_view_name;
    global $db;
    $sql = "SELECT TABLE_NAME t_name
			FROM information_schema.VIEWS 
			ORDER BY TABLE_NAME";
	$result=$db->query($sql);
	$list="<select id='data_source_view_name' name='data_source_view_name' title=''>";
	$list .= "<option value=''> </option>";
	while($row=$db->fetchByAssoc($result)){
		if ($row['t_name'] != '') {
			if ($row['t_name'] == $view_name) {
				$list .= " <option selected='selected' value='".$row['t_name']."'>".$row['t_name']."</option> ";
			}
			else{
				$list .= " <option value='".$row['t_name']."'>".$row['t_name']."</option> ";
			}
	    }
    }
    $list .="</select>";
	/*if($record !=""){//如果不是新增（即如果是编辑已有记录）
		
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
    }*/
 

