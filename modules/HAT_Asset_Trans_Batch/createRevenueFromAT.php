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

function createRevenueFromAT($ATId){

	if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
		ACLController::displayNoAccess();
		die;
	}

	require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
	$at = new HAT_Asset_Trans_Batch();
	$at->retrieve($ATId);
	if ($at->asset_trans_status=='DRAFT'||$at->asset_trans_status=='CANCELED'){
		die('已批准的资产事务处理单才能创建收支计费项!');
	}

	$beanAT = BeanFactory :: getBean('HAT_EventType',$at->hat_eventtype_id);
	if ($beanAT->revenue_eventtype_id_c!='') { 
		$beanRevenue = BeanFactory :: getBean('HAT_EventType',$beanAT->revenue_eventtype_id_c);
	}else{
		die('事务单的事件类型未设置对应的收支计费项的事务类型，请联系运维人员!');
	}
	if ($beanRevenue){
		$rawRow['event_type'] = $beanRevenue->name;
	}

	$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
	$rawRow['revenue_quote_number'] = '';
	$rawRow['name'] = $at->name.'收支';
	$rawRow['clear_status'] = 'Unclear';
	$rawRow['event_date'] = '' ;
	$rawRow['source_code'] = 'HAT_Asset_Trans_Batch';
	$rawRow['source_id'] = $at->id;


	$rawRow['source_reference'] =  $at->tracking_number;
	$rawRow['contact_id_c'] = $at->owner_id;

	$rawRow['expense_group'] = $at->event_type;

	$quoteRow['line_item_type_c']='Service';
	$quoteRow['vat']="0.0";
	$quoteRow['product_total_price']='';
	$quoteRow['product_list_price']='';
	$quoteRow['product_unit_price']='';
	$quoteRow['name']=$at->name;

	$at->haos_revenues_quotes_id=createRevenue($rawRow,$quoteRow);
	$at->save();
	return $at->haos_revenues_quotes_id;

}

?>
