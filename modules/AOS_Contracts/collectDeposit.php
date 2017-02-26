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


require_once('modules/AOS_Contracts/createRevenueFromContract.php');

$contractId=$_REQUEST['record'];

$revenues_id=createRevenueFromContract($contractId,'2');
if ($revenues_id==""){
	die('当前没有押金需要收取！');
}
$name=getName($contractId,'2');
$list=getCord($revenues_id);
$status='Paid';
$value_str=implode(',', $list['value']);
$cord_str=implode(',', $list['cord']);
$source_reference=getSourceReference($contractId);
/*$aos_invoices_id=createInvoiceFromContract($haos_revenues_quotes_id,'1');*/
//?module=AOS_Invoices&action=editview&data='+val['value']+'&cord='+val['cord']
header('Location: index.php?module=AOS_Invoices&action=EditView&status='.$status.'&name='.$name.'&data='.$value_str.'&cord='.$cord_str.'&amount_c=0&source_code_c=AOS_Contracts&source_reference_c='.$source_reference);

?>
