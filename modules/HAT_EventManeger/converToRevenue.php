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

if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
	ACLController::displayNoAccess();
	die;
}

require_once('modules/HAT_EventManeger/HAT_EventManeger.php');
require_once('modules/HAOS_Revenues_Quotes/HAOS_Revenues_Quotes.php');
require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
global $timedate;

//Setting values in EventManager
$event = new HAT_EventManeger();
$event->retrieve($_REQUEST['record']);
$event->save();

	//Setting Invoice Values
$quote = new HAOS_Revenues_Quotes();
$rawRow = $event->fetched_row;
$rawRow['id'] = '';
$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
$rawRow['revenue_quote_number'] = '';
$rawRow['clear_status'] = 'Unclear';
$rawRow['event_date'] = date_format(date_create($event->event_date),"Y-m-d") ;
$rawRow['source_code'] = 'Others';
$rawRow['source_id'] = $event->id;
$rawRow['source_reference'] =  $event->event_number;
$rawRow['contract_number'] = $event->person_number;
$rawRow['contact_id_c'] = $event->contact_id_c;
$rawRow['contract_name'] = $event->person_name;
$rawRow['date_entered'] = '';
$rawRow['date_modified'] = '';

$bean_codes = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
	'name' => $event->event_type
	));
if ($bean_codes) { 
	$rawRow['haa_codes_id_c']= isset($bean_codes->id)?$bean_codes->id:'';
}
$rawRow['expense_group'] = $event->event_type;



$quote->populateFromRow($rawRow);
$quote->process_save_dates =false;
$quote->save();
$event->haos_revenues_quotes_id=$quote->id;
$event->save();



//Setting Line Items
$prod_invoice = new AOS_Products_Quotes();
$prod_invoice->parent_id=$quote->id;
$prod_invoice->parent_type='HAOS_Revenues_Quotes';
$prod_invoice->line_item_type_c='Service';
$prod_invoice->vat="0.0";
$prod_invoice->product_total_price=$event->fine;
$prod_invoice->product_list_price=$event->fine;
$prod_invoice->product_unit_price=$event->fine;
$prod_invoice->name=$event->name;
$prod_invoice->save();

ob_clean();
header('Location: index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$quote->id);
?>
