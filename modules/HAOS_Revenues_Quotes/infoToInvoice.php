<?php
//error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

global $db;
$RevenueId=$_POST["record"];
 

$sql="select contact_id_c,account_id_c  from haos_revenues_quotes where id ='".$RevenueId."'";
$result=$db->query($sql);
$account=array();
while ($result_record = $db->fetchByAssoc($result)) {
	$account[]=$result_record["contact_id_c"];
	$account[]=$result_record["account_id_c"];
}

$sqlstr="select pg.id from aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.deleted = 0 and pg.parent_id ='".$RevenueId."' ORDER BY lig.number ASC,pg.number ASC";
$results=$db->query($sqlstr);
$re_cords=array();
while ($record = $db->fetchByAssoc($results)) {
	$re_cords[]=$record["id"];
}

//add by hq 20170309 判断来源是否是合同
			$sourceTypeSql = 'select count(*) result,source_id,event_date from haos_revenues_quotes where id ='.$RevenueId.' and source_code="AOS_Contracts"';
			$sourceTypeResult=$db->query($sourceTypeSql);

			$sourceCount=array();
			$name='';
			$source_id = '';
			$isOneContracts = 'N';
			while ($countResult = $db->fetchByAssoc($sourceTypeResult)) {
				$sourceCount[]=$countResult["result"];	
				$source_id = $countResult["source_id"];
				$event_date = $countResult["event_date"];				
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
			//add by hq 20170309 获取收支发生日期
			$eventDateSql = 'select event_date from haos_revenues_quotes where id ='.$RevenueId;
			$eventDateResult=$db->query($eventDateSql);

			$event_date = '';
			while ($eventDateLine = $db->fetchByAssoc($eventDateResult)) {
				$event_date=$eventDateLine["event_date"];			
			}
			//end add
			//修改收支状态为 已结清
			updateRenenuesStatus($RevenueId);
$return_result = array(
                  'type'=>1,
                  'value'=>$re_cords,
                  'cord'=>$account,
                  'name'=>$name,
                  'event_date'=>$event_date,
                  );
echo json_encode($return_result);
//echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account));


function updateRenenuesStatus($RevenueId){

	require_once('modules/AOS_Invoices/createInvoices.php');
	$Revenues =BeanFactory::getBean("HAOS_Revenues_Quotes",$RevenueId);
	$Revenues->status='Cleared';
	$Revenues->save();

}

?>