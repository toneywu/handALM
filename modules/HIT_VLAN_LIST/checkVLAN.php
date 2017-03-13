<?php 
	global $db;
	$vlan_name = $_POST['vlan_name'];
    $vlan_id = $_POST['vlan_id'];
	
    if ($vlan_name == "") {
        echo "VLAN编号为空,请输入!";
        exit();
    }
    //如果是修改则不要把自己算进去
	if ($vlan_id != "") {
        $sql="SELECT COUNT(*) is_exists
                FROM hit_vlan_list
                WHERE name = '".$vlan_name."'
                AND id != '".$vlan_id."'
                GROUP BY name";
	}else{
        $sql="SELECT COUNT(*) is_exists
                FROM hit_vlan_list
                WHERE name = '".$vlan_name."'
                GROUP BY name";
    }
    $result = $db->query($sql);
    //echo($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $is_exists = $row['is_exists'];
        if ($is_exists != 0) {
            echo "VLAN编号已存在,请重新输入!";
            exit();
        }else{
            echo "S";
            exit();
        }
    }
	
?>