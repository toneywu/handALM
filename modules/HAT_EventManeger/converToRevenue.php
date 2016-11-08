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
	$rawRow['date_entered'] = '';
	$rawRow['date_modified'] = '';
$quote->populateFromRow($rawRow);
$quote->process_save_dates =false;
$quote->save();


/*	//Setting Group Line Items
$sql = "SELECT * FROM aos_line_item_groups WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$quote->id."' AND deleted = 0";
$result = $this->bean->db->query($sql);
while ($row = $this->bean->db->fetchByAssoc($result)) {
	$row['id'] = '';
	$row['parent_id'] = $invoice->id;
	$row['parent_type'] = 'AOS_Invoices';
	if($row['total_amt'] != null) $row['total_amt'] = format_number($row['total_amt']);
	if($row['discount_amount'] != null) $row['discount_amount'] = format_number($row['discount_amount']);
	if($row['subtotal_amount'] != null) $row['subtotal_amount'] = format_number($row['subtotal_amount']);
	if($row['tax_amount'] != null) $row['tax_amount'] = format_number($row['tax_amount']);
	if($row['subtotal_tax_amount'] != null) $row['subtotal_tax_amount'] = format_number($row['subtotal_tax_amount']);
	if($row['total_amount'] != null) $row['total_amount'] = format_number($row['total_amount']);
	$group_invoice = new AOS_Line_Item_Groups();
	$group_invoice->populateFromRow($row);
	$group_invoice->save();
}

	//Setting Line Items
$sql = "SELECT * FROM aos_products_quotes WHERE parent_type = 'AOS_Quotes' AND parent_id = '".$quote->id."' AND deleted = 0";
$result = $this->bean->db->query($sql);
while ($row = $this->bean->db->fetchByAssoc($result)) {
	$row['id'] = '';
	$row['parent_id'] = $invoice->id;
	$row['parent_type'] = 'AOS_Invoices';
	if($row['product_cost_price'] != null)
	{
		$row['product_cost_price'] = format_number($row['product_cost_price']);
	}
	$row['product_list_price'] = format_number($row['product_list_price']);
	if($row['product_discount'] != null)
	{
		$row['product_discount'] = format_number($row['product_discount']);
		$row['product_discount_amount'] = format_number($row['product_discount_amount']);
	}
	$row['product_unit_price'] = format_number($row['product_unit_price']);
	$row['vat_amt'] = format_number($row['vat_amt']);
	$row['product_total_price'] = format_number($row['product_total_price']);
	$row['product_qty'] = format_number($row['product_qty']);
	$prod_invoice = new AOS_Products_Quotes();
	$prod_invoice->populateFromRow($row);
	$prod_invoice->save();
}*/
ob_clean();
header('Location: index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$invoice->id);
?>
