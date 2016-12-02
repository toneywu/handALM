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

function createRevenueFromContract($contractId){
	if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
		ACLController::displayNoAccess();
		die;
	}

	require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
	$contract = new AOS_Contracts();
	$contract->retrieve($contractId);
	if ($contract->status!='Signed'){
		die('已签约的合同才能创建收支计费项!');
	}

	$productQuoteBean=BeanFactory::getBean('AOS_Products_Quotes');
	$quotesBeanList=$productQuoteBean->get_full_list(
//Order by
		'group_id',
//where Clause
		"aos_products_quotes.parent_type='AOS_Contracts' and aos_products_quotes.parent_id='".$contract->id."'"
		);

	$rawRow['haa_frameworks_id_c'] = $contract->haa_frameworks_id_c;
	$rawRow['revenue_quote_number'] = '';
	$rawRow['clear_status'] = 'Unclear';

	$rawRow['source_code'] = 'AOS_Contracts';
	$rawRow['source_id'] = $contract->id;
	$rawRow['source_reference'] = $contract->contract_number_c;
	$rawRow['contact_id_c'] = $contract->contact_id;
	$rawRow['account_id_c'] = $contract->contract_account_id;


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
		}
		$groupBean=BeanFactory::getBean('AOS_Line_Item_Groups',$quoteBean->group_id);
		$rawRow['expense_group'] = $groupBean->name;
		$rawRow['name'] = $contract->name.'-'.$groupBean->name.'-收支';
		$rawRow['event_date'] = $next_account_day_old;
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
	}
}

?>
