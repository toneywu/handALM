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

require_once('modules/HAT_Incidents/HAT_Incidents.php');
require_once('modules/HAOS_Revenues_Quotes/createRevenue.php');
global $timedate;

//Setting values in EventManager
$event = new HAT_Incidents();
$event->retrieve($_REQUEST['record']);
$event->save();

	//Setting Invoice Values
$rawRow = $event->fetched_row;
$rawRow['id'] = '';
$rawRow['haa_frameworks_id_c'] = $rawRow['haa_frameworks_id_c'];
$rawRow['revenue_quote_number'] = '';
$rawRow['clear_status'] = 'Unclear';
$rawRow['event_date'] = date_format(date_create($event->event_date),"Y-m-d") ;
$rawRow['source_code'] = 'HAT_Incidents';
$rawRow['source_id'] = $event->id;

$rawRow['source_reference'] =  $event->event_number;
$rawRow['contract_number'] = $event->person_number;
$rawRow['contact_id_c'] = $event->contact_id_c;
$rawRow['contract_name'] = $event->person_name;

$rawRow['expense_group'] = $event->event_type;
$rawRow['event_type'] =$event->event_type;
$rawRow['name']=$event->name.'收支';

//Setting Line Items
$quoteRow['line_item_type_c']='Service';
$quoteRow['vat']="0.0";
$quoteRow['product_total_price']=$event->fine;
$quoteRow['product_list_price']=$event->fine;
$quoteRow['product_unit_price']=$event->fine;
$quoteRow['name']=$event->name;

$event->haos_revenues_quotes_id=createRevenue($rawRow,$quoteRow);
$event->save();

ob_clean();
header('Location: index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$event->haos_revenues_quotes_id);
?>
