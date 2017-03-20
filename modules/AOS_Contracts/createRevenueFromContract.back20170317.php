<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

function createRevenueFromContract($contractId,$type){
	global $db;
	if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
		ACLController::displayNoAccess();
		die;
	}
 
	require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
	$contract = new AOS_Contracts();
	$contract->retrieve($contractId);
	if ($contract->status!='Signed' and $type==0){
		die('已签约的合同才能创建收支计费项!');
	}else if ($contract->status!='Signed' and $type==1){
		die('已签约的合同才能收取预付款!');
	}else if ($contract->status!='Signed' and $type==2){
		die('已签约的合同才能收取押金!');
	}

	$productQuoteBean=BeanFactory::getBean('AOS_Products_Quotes');
	if($type==0){
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=0 and aos_products_quotes_cstm.prepay_flag_c=0"
		);
	}else if($type==1){ //add by tagnqi 20170224
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=0 and aos_products_quotes_cstm.prepay_flag_c=1"
		);
	}else if($type==2){ 
		
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=1 and aos_products_quotes_cstm.prepay_flag_c=0"
		);
	}
	//end add by tagnqi 20170224
	$rawRow['haa_frameworks_id_c'] = $contract->haa_frameworks_id_c;
	$rawRow['revenue_quote_number'] = '';
	$rawRow['clear_status'] = 'Unclear';

	$rawRow['source_code'] = 'AOS_Contracts';
	$rawRow['source_id'] = $contract->id;
	$rawRow['source_reference'] = $contract->contract_number_c;
	$rawRow['contact_id_c'] = $contract->contact_id;
	$rawRow['account_id_c'] = $contract->contract_account_id;

if($quotesBeanList){
	foreach($quotesBeanList as $quoteBean){
		if ($quoteBean->settlement_period_c=='Once'&&$quoteBean->final_account_day_c!='') {
			continue;
		}
		$next_account_day_old=date_format(date_create($quoteBean->next_account_day_c),"Y-m-d");
		if ($quoteBean->settlement_period_c=='Monthly') {
			if ($quoteBean->effective_end_c!=''&&$quoteBean->effective_end_c<$next_account_day_old){
				continue;
			}
			else{
				$next_account_day_new=date('Y-m-d',strtotime("{$next_account_day_old} +1 month"));
				$quoteBean->next_account_day_c=$next_account_day_new;
			}
			$revenues_count = $db->getOne("select count(*) cnt from haos_revenues_quotes where 1=1 and aos_source_products_quotes_id_c='".$quoteBean->id."' and source_code='AOS_Contracts' and source_id='".$contract->id."'");
			if($revenues_count>=$quoteBean->number_of_periods_c){
				continue;
			}
		}
		//add by hq 20170310

		$rawRow['aos_source_products_quotes_id_c'] = $quoteBean->id;
		
		//end 20170310

		$groupBean=BeanFactory::getBean('AOS_Line_Item_Groups',$quoteBean->group_id);
		$rawRow['expense_group'] = $groupBean->name;
		$rawRow['prepay_flag'] = $quoteBean->prepay_flag_c;
		$rawRow['deposit_flag'] = $quoteBean->deposit_flag_c;
		$rawRow['name'] = $contract->name.'-'.$groupBean->name.'-收支';
		$rawRow['event_date'] = $next_account_day_old;
		//add by tangqi 20172024 获取期间字段
		
		$sql="SELECT
		hp.`name`
		FROM
		haa_frameworks hf,
		haa_period_sets hps,
		haa_periods hp
		WHERE 1=1
		and hf.deleted=0
		and hps.deleted=0
		and hp.deleted=0
		and hf.haa_period_sets_id_c=hps.id
		and hps.id=hp.haa_period_sets_id_c
		and hp.start_date<='".$next_account_day_old."'".
		"and hp.end_date>='".$next_account_day_old."'".
		"and hf.id='".$contract->haa_frameworks_id_c."'";
		$result=$db->query($sql);
		$row=$db->fetchByAssoc($result); 
		$rawRow['period_name']=$row['name']; 
		//end add by tangqi 20172024
		$quoteBean->final_account_day_c=$rawRow['event_date'];
		$quoteRow=$quoteBean->fetched_row;
		if ($quoteRow['product_id']!=''&&$quoteRow['product_id']!='0'){
			$quoteRow['line_item_type_c']='Product';
		}
		else{
			$quoteRow['line_item_type_c']='Service';
		}
		$haos_revenues_quotes_id=createRevenue($rawRow,$quoteRow);
		$quoteBean->save();
		$idArray[]=$haos_revenues_quotes_id;
	}
	}
	return $idArray;
}

function getSourceReference($contractId){
 	$contract = new AOS_Contracts();
    $contract->retrieve($contractId);
    $source_reference = $contract->contract_number_c;
    return $source_reference;
}
function getName($contractId,$type){
	global $app_list_strings;
    if($type==1){ //add by tagnqi 20170224
		$act_name="预付";
	
	}else if($type==2){
		$act_name="押金";
	
	}
    $contract = new AOS_Contracts();
    $contract->retrieve($contractId);
    $source_code = 'AOS_Contracts';
	$source_reference = $contract->contract_number_c;

	$productQuoteBean=BeanFactory::getBean('AOS_Products_Quotes');
	if($type==0){
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=0 and aos_products_quotes_cstm.prepay_flag_c=0"
		);
	}else if($type==1){ //add by tagnqi 20170224
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=0 and aos_products_quotes_cstm.prepay_flag_c=1"
		);
	}else if($type==2){
		
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'and aos_products_quotes_cstm.deposit_flag_c=1 and aos_products_quotes_cstm.prepay_flag_c=0"
		);
	}
foreach($quotesBeanList as $quoteBean){
		$next_account_day_old=date_format(date_create($quoteBean->next_account_day_c),"Y-m-d");
		}
	$name = $app_list_strings['haos_source_code_list']['AOS_Contracts'].'-'.$source_reference.'-'.$act_name.'-'.$next_account_day_old;

	return $name;
}

function getCord($revenues_id){
	global $db;

		foreach ($revenues_id as $k => $v) {
			$revenues_id[$k]="'".$revenues_id[$k]."'";
		}
$str=implode(',', $revenues_id);
			$sql="select count(*) result,contact_id_c,account_id_c  from haos_revenues_quotes where id in(".$str.")";
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
				$list=array('value'=>$re_cords,'cord'=>$account);
				return $list;
			}
		
}

//end add by tangqi 20172024

//add by hq 20170316
function getMoreInfo($contractId){
    $return_result = array(
                  'return_status'=>'S',
                  'return_msg'=>'',
                  'return_data'=>array(),
                  );
              $err_msg = '';

	require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
	$contract = new AOS_Contracts();
	$contract->retrieve($contractId);
	 // $return_result['return_data']['cord']=
	 // $return_result['return_data']['']=
	 $AccountAndContact = array();
	 $AccountAndContact[]=$contract->contact_id;
	 $AccountAndContact[]=$contract->contract_account_id;
	 $return_result['return_data']['cord']=$AccountAndContact;
	return  $return_result;
}
//end add 20170316
?>
