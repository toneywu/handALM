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
function createRevenue($revenueRow,$quoteRow){
    require_once('modules/HAOS_Revenues_Quotes/HAOS_Revenues_Quotes.php');
    require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
//Setting Revenue Values
    $revenue = new HAOS_Revenues_Quotes();
    $revenueRow['id'] = '';
    $revenueRow['haa_frameworks_id_c'] = $revenueRow['haa_frameworks_id_c'];
    $revenueRow['revenue_quote_number'] = '';
    $revenueRow['date_entered'] = '';
    $revenueRow['date_modified'] = '';
    //处理事件类型
    if ($revenueRow['event_type']!=''){
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'name' =>  $revenueRow['event_type'],
            'basic_type' => 'REVENUE'
            ));
        if ($bean_types) { 
            $revenueRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $revenueRow['event_type'] = $revenueRow['event_type'] ;
        }
        else{
            $revenueRow['event_type'] = '';
            $revenueRow['hat_eventtype_id_c']= '';
        }
    }
    else {
        $bean_types = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'event_short_desc' => 'default',
            'basic_type' => 'REVENUE'
            ));
        if ($bean_types) { 
            $revenueRow['hat_eventtype_id_c']= isset($bean_types->id)?$bean_types->id:'';
            $revenueRow['event_type'] = isset($bean_types->name)?$bean_types->name:'' ;
        }
        else{
            $revenueRow['event_type'] = '';
            $revenueRow['hat_eventtype_id_c']= '';
        }
    }
//处理费用组
    $bean_codes = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
        'name' =>  $revenueRow['expense_group'],
        'code_module'=>'revenue'
        ));
    if ($bean_codes) { 
        $revenueRow['haa_codes_id_c']= isset($bean_codes->id)?$bean_codes->id:'';
        $revenueRow['expense_group']=$revenueRow['expense_group'];
    }
    else{
        $revenueRow['expense_group'] = '';
        $revenueRow['haa_codes_id_c']= '';
    }

    $revenue->populateFromRow($revenueRow);
    $revenue->process_save_dates =false;
    $revenue->save();
    $revenue_quote_id=$revenue->id;

//Setting Quote Items
    $quote = new AOS_Products_Quotes();
    $quoteRow['id'] = '';
    $quoteRow['parent_id']=$revenue_quote_id;
    $quoteRow['parent_type']='HAOS_Revenues_Quotes';
    $quote->populateFromRow($quoteRow);
    $quote->process_save_dates =false;
    $quote->save();
    return $revenue_quote_id;
}