<?php
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $db,$app_list_strings;
$cord_array=$_POST["data"];
	if (preg_match("/[']|[\"]/", $cord_array)) {//简单防止sql注入
		$sql='';
	}else{
		$cord_array=preg_split('/,/', $cord_array);
		foreach ($cord_array as $k => $v) {
			$cord_array[$k]="'".$cord_array[$k]."'";
		}
		$str=implode(',', $cord_array);

//Add By osmond.liu 170108 
//增加收支项状态验证
		$cleared_cnt=$db->getOne("select count(*) cnt from haos_revenues_quotes where id in(".$str.") and clear_status='Cleared'");
		if ($cleared_cnt>0){
			echo json_encode(array('type'=>-1));
		}
		else{ 
//End Add 170108			

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

		 	//add by hq 20170309 判断勾选有且只有一个合同
			$sourceTypeSql = 'select count(*) result,source_id from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts" group by source_id';
			$sourceTypeResult=$db->query($sourceTypeSql);
			$sourceCount=array();
			$name='';
			$source_id = '';
			$isOneContracts = 'N';
			while ($countResult = $db->fetchByAssoc($sourceTypeResult)) {
				$sourceCount[]=$countResult["result"];	
				$source_id = $countResult["source_id"];				
			}
			if(sizeof($sourceCount) == 1 && $source_id!=''){
				$sourceSql = 'select source_code,source_reference from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts" group by source_id';
				$sourceResult=$db->query($sourceSql);
				$source_code = '';
				$source_reference = '';
				while ($souResult = $db->fetchByAssoc($sourceResult)) {
				   $source_code=$souResult["source_code"];	
				   $source_reference=$souResult["source_reference"];			
				}
				
				$source_name = $app_list_strings['haos_source_code_list'][$source_code];
				if($source_name!='' && $source_reference!=''){
					$isOneContracts = 'Y';
					$name=$source_name.' '.$source_reference;
				}
			}
			//end add 20170309

			//add by hq 20170309 判断收支发生日期
			$event_date='';
			$revenues_count=$db->getOne("select count(*) cnt from haos_revenues_quotes where id in(".$str.")");
			if ($revenues_count>1){
				$AOS_Contracts_count=$db->getOne('select min(event_date) from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts"');
				if($AOS_Contracts_count>=1){
					$eventDateSql = 'select min(event_date) min_event_date from haos_revenues_quotes where id in('.$str.') and source_code="AOS_Contracts"';
					$eventDateResult=$db->query($eventDateSql);
					while ($eventDate = $db->fetchByAssoc($eventDateResult)) {
				  	 $event_date=$eventDate["min_event_date"];			
					}
				}	
			}else if($revenues_count==1){
				$eventDateSql = 'select event_date from haos_revenues_quotes where id in('.$str.')';
				$eventDateResult=$db->query($eventDateSql);
				while ($eventDate = $db->fetchByAssoc($eventDateResult)) {
				   $event_date=$eventDate["event_date"];			
				}
			}
			//end add 20170309

				$sqlstr="select pg.id from aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.deleted = 0 and pg.parent_id in(".$str.") ORDER BY lig.number ASC,pg.number ASC";
				$results=$db->query($sqlstr);
				$re_cords=array();
				while ($record = $db->fetchByAssoc($results)) {
					$re_cords[]=$record["id"];
				}

				
				echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'name'=>$name,'event_date'=>$event_date));
				// if($isOneContracts == 'Y'){
				// 	$isOneContracts = 'Y';
				// 	echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'name'=>$name,'isOneContracts'=>$isOneContracts));
				// }else{
				// 	$isOneContracts = 'N';
				// 	echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account,'isOneContracts'=>$isOneContracts));
				// }
				
				

			}
		}
	}
	?>