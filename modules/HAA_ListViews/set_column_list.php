<?php

    $t_name=$_POST['t_name'];
    $record=$_POST['record'];
    global $db;
    $sql = "SELECT c.COLUMN_NAME c_name
			FROM information_schema.COLUMNS c
			WHERE c.TABLE_NAME = '".$t_name."'";
	$result=$db->query($sql);
	$c_list[0].="<option value=''> </option>";
	while($row=$db->fetchByAssoc($result)){
		if ($row['c_name'] != '') {
			$c_list[0] .= " <option value='".$row['c_name']."'>".$row['c_name']."</option> ";
	    }
    }

    if ($record != "") {
	    $bean_v = BeanFactory::getBean('HAA_ListViews',$record);
	    $c_list[1] = $bean_v->sort_column1;
	    $c_list[2] = $bean_v->sort_column2;
	    $c_list[3] = $bean_v->sort_column3;
	    $c_list[4] = $bean_v->sort_column4;
    }
    echo json_encode($c_list);
	
 

