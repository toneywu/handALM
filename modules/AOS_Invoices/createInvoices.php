<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
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
 * @author Salesagility Ltd <info@salesagility.com>
 */
//创建收支项公用函数
    require_once('modules/AOS_Invoices/AOS_Invoices.php');
    require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
function createInvoices($invoiceRow,$quoteRow){
//Setting Revenue Values
    
    
    $invoice = new AOS_Invoices();
    $invoiceRow['id'] = '';
    $invoiceRow['haa_frameworks_id_c'] = $invoiceRow['haa_frameworks_id_c'];
    $invoiceRow['number'] = '';
    $invoiceRow['date_entered'] = '';
    $invoiceRow['date_modified'] = '';
    $invoiceRow['period_name_c'] = $invoiceRow['period_name_c'];
    //处理事件类型

    if ($invoiceRow['event_type_c']!=''){
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'name' =>  $invoiceRow['event_type_c'],
            'basic_type' => 'REVENUE'
            ));
        if ($bean_types) { 
            $invoiceRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $invoiceRow['event_type_c'] = $invoiceRow['event_type_c'] ;
        }
        else{
            $invoiceRow['event_type_c'] = '';
            $invoiceRow['hat_eventtype_id_c']= '';
        }
    }
    else {
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'event_short_desc' => 'default',
            'basic_type' => 'REVENUE'
            ));
        if ($bean_types) { 
            $invoiceRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $invoiceRow['event_type_c'] = isset($bean_types->name)?$bean_types->name:'' ;
        }
        else{
            $invoiceRow['event_type_c'] = '';
            $invoiceRow['hat_eventtype_id_c']= '';
        }
    }

    $invoice->populateFromRow($invoiceRow);
    $invoice->process_save_dates =false;
    $invoice->save();
    $invoice_id=$invoice->id;

//Setting Quote Items
    $quote = new AOS_Products_Quotes();
    $quoteRow['id'] = '';
    $quoteRow['parent_id']=$invoice_id;
    $quoteRow['parent_type']='AOS_Invoices';
    if($quoteRow['line_item_type_c']=='Service'){
        $quoteRow['product_id']='0';
    }
    $quote->populateFromRow($quoteRow);
    $quote->process_save_dates =false;
    $quote->save();
    return $invoice_id;
}