<?php
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $db;
$cord_array=$_POST["data"];
	if (preg_match("/[']|[\"]/", $cord_array)) {//简单防止sql注入
		$sql='';
	}else{
		$cord_array=preg_split('/,/', $cord_array);
		foreach ($cord_array as $k => $v) {
			$cord_array[$k]="'".$cord_array[$k]."'";
		}
		$str=implode(',', $cord_array);
		$sql="select count(*) result,contact_id_c,account_id_c  from haos_revenues_quotes where id in(".$str.") group by contact_id_c,account_id_c";
		$result=$db->query($sql);
		$account=array();
		while ($result_record = $db->fetchByAssoc($result)) {
			$cord[]=$result_record["result"];
			$account[]=$result_record["contact_id_c"];
			$account[]=$result_record["account_id_c"];
		}
		if (sizeof($cord)>1) {
			echo json_encode(array('type'=>0));
		}else{
			$sqlstr="select pg.id from aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.deleted = 0 and pg.parent_id in(".$str.") ORDER BY lig.number ASC,pg.number ASC";
			$results=$db->query($sqlstr);
			$re_cords=array();
			while ($record = $db->fetchByAssoc($results)) {
				$re_cords[]=$record["id"];
			}
			echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account));

		}
	}
	?>