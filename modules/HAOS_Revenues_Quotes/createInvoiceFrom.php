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
//暂时只有单条创建
function createInvoiceFrom($RevenueId){
	global $db;
	$return_result = array(
                  'return_status'=>'S',
                  'return_msg'=>'',
                  'return_data'=>array(),
                  );
    $err_msg = '';

	if(!(ACLController::checkAccess('AOS_Invoices', 'edit', true))){
		ACLController::displayNoAccess();
		die;
	}

	require_once('modules/AOS_Invoices/createInvoices.php');
	$Revenues = new HAOS_Revenues_Quotes();
	$Revenues->retrieve($RevenueId);
 
	
	

	// if ($at->asset_trans_status=='DRAFT'||$at->asset_trans_status=='CANCELED'){
	// 	die('已批准的资产事务处理单才能创建收支计费项!');
	// }

	// $beanAT = BeanFactory :: getBean('HAT_EventType',$at->hat_eventtype_id);
	// if ($beanAT->revenue_eventtype_id_c!='') { 
	// 	$beanRevenue = BeanFactory :: getBean('HAT_EventType',$beanAT->revenue_eventtype_id_c);
	// }else{
	// 	die('事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!');
	// }
	
	// if ($beanRevenue){
	// 	$rawRow['event_type'] = $beanRevenue->name;
	// }

	// $sql="select contact_id_c,account_id_c  from haos_revenues_quotes where id =".$RevenueId." group by contact_id_c,account_id_c";
	// 		$result=$db->query($sql);
	// 		$account=array();
	// 		while ($result_record = $db->fetchByAssoc($result)) {
	// 			$account[]=$result_record["contact_id_c"];
	// 			$account[]=$result_record["account_id_c"];
	// 		}
		
		//$pgBean = BeanFactory :: getBean('AOS_Products_Quotes',$at->hat_eventtype_id);
		$sqlstr="select pg.id from aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE pg.deleted = 0 and pg.parent_id =".$RevenueId." ORDER BY lig.number ASC,pg.number ASC";
				$results=$db->query($sqlstr);
				$re_cords='';
		while ($record = $db->fetchByAssoc($results)) {
					$re_cords=$record["id"];
		}
				//echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account));

			
    if($Revenues->source_code=='AOS_Contracts'){
    	$rawRow['name'] = $Revenues->name;
    }

	$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
	
	$rawRow['event_date'] = '' ;
	$rawRow['source_code_c'] = 'HAOS_Revenues_Quotes';
	$rawRow['source_id_c'] = $Revenues->id;
	$rawRow['billing_account_id'] = $Revenues ->account_id_c;
	$rawRow['billing_contact_id'] = $Revenues ->contact_id_c;
	$rawRow['amount_c'] = 
	//$rawRow['source_reference'] =  $at->tracking_number;

	//drop by hq 201731 人员留空
	//$rawRow['contact_id_c'] = $at->owner_id; //
	//end drop 

	$rawRow['expense_group'] = $Revenues->event_type;

	$quoteRow['line_item_type_c']='Service';
	$quoteRow['vat']="0.0";
	$quoteRow['product_total_price']='';
	$quoteRow['product_list_price']='';
	$quoteRow['product_unit_price']='';
	$quoteRow['name']=$Revenues->name;

	$Revenues->aos_invoices_id_c=createInvoices($rawRow,$quoteRow);
	$Revenues->save();

	$return_result['return_msg'] = $err_msg;
	$return_result['return_data']['aos_invoices_id_c'] = $Revenues->aos_invoices_id_c;
	return $return_result;

	//return $Revenues->aos_invoices_id_c;
 
}

?>
