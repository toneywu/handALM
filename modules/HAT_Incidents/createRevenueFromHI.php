<?php
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
function createRevenueFromHI($Id){
	$return_result = array(
                  'return_status'=>'S',
                  'return_msg'=>'',
                  'return_data'=>array(),
                  );
              $err_msg = '';
if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
	ACLController::displayNoAccess();
	die;
}

require_once('modules/HAT_Incidents/HAT_Incidents.php');
require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
global $timedate;


//Setting values in EventManager
$event = new HAT_Incidents();
$event->retrieve($Id);
$event->save();

$rawRow = $event->fetched_row;
    //add by hq 20170311
	$beanAT = BeanFactory :: getBean('HAT_EventType',$event->hat_eventtype_id_c);
	$rawRow['event_type']='';
	if ($beanAT->revenue_eventtype_id_c!='') { 
		$beanRevenue = BeanFactory :: getBean('HAT_EventType',$beanAT->revenue_eventtype_id_c); 

		if ($beanRevenue){
			$rawRow['event_type'] = $beanRevenue->name;
		}
	}else{
		//die('事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!'.$ATId);
		$return_result['return_status']='E';
		$err_msg .= '事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!';
	}
	//end add 20170311
	//Setting Invoice Values

$rawRow['id'] = '';
//modify by hq 20170312
//$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
$rawRow['haa_frameworks_id_c'] = $event->haa_frameworks_id;
//end modify 
$rawRow['revenue_quote_number'] = '';
$rawRow['clear_status'] = 'Unclear';
$rawRow['event_date'] = date_format(date_create($event->event_date),"Y-m-d");
require_once('modules/HAOS_Revenues_Quotes/getPeriodForPHP.php');
$rawRow['period_name'] = getPeriod($rawRow['event_date'],$rawRow['haa_frameworks_id_c']);

$rawRow['source_code'] = 'HAT_Incidents';
$rawRow['source_id'] = $event->id;

$rawRow['source_reference'] =  $event->event_number;
$rawRow['contract_number'] = $event->person_number;
$rawRow['contact_id_c'] = $event->contact_id_c;
$rawRow['contract_name'] = $event->person_name;
$rawRow['hat_assets_id'] = $event->hat_assets_id_c;

$rawRow['expense_group'] = $event->event_type;
//$rawRow['event_type'] =$event->event_type;
$rawRow['name']=$event->name.'收支';
  
//Setting Line Items
$quoteRow['line_item_type_c']='Service';
$quoteRow['vat']="0.0";
$quoteRow['product_total_price']=$event->fine;
$quoteRow['product_list_price']=$event->fine;
$quoteRow['product_unit_price']=$event->fine;
$quoteRow['name']=$event->name;
//die($rawRow);

$event->haos_revenues_quotes_id=createRevenue($rawRow,$quoteRow);
$event->save();



$return_result['return_data']['haos_revenues_quotes_id']=$event->haos_revenues_quotes_id;
$return_result['return_msg']=$err_msg;
return $return_result;
// ob_clean();
// header('Location: index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$event->haos_revenues_quotes_id);
}
?>
