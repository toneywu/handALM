<?php
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
 * @author Salesagility Ltd <support@salesagility.com>
 */

require_once('include/MVC/Controller/SugarController.php');

class HAOS_PaymentsController extends SugarController {
	// protected $_prevHeaderAmount = '';
	// protected $_prevLineAmount = 0;


	public function pre_save()
	{
		 $prevHeaderAmount = 0;
	     $prevLineAmount = 0;

		$paymentsFocus = new HAOS_Payments;
		$paymentsFocus->retrieve($_REQUEST['record']);
       		

	    $post_data=$_POST;
	    $prevHeaderAmount=$_POST['payment_amount'];
        $line_count = isset($post_data['line_deleted']) ? count($post_data['line_deleted']) : 0;
        
        for ($i = 0; $i < $line_count; ++$i) {
            $key="line_";
            $lines = new HAOS_Payment_Invoices();
            if ($post_data[$key . 'deleted'][$i] == 1) {
                $lines->mark_deleted($post_data[$key . 'id'][$i]);
            } else {
                $prevLineAmount =$prevLineAmount + $post_data['line_amount'][$i];   
            }
        }
        // var_dump($prevHeaderAmount);
        // var_dump($prevLineAmount);
        // exit();
        // $prevHeaderAmount_num = unformatNumber($prevHeaderAmount,',','.');
        // $prevLineAmount_num = unformatNumber($prevLineAmount,',','.');
        if($prevHeaderAmount != $prevLineAmount){
			die('头付款金额必须等于行付款金额之和');
        }else{
        	parent::pre_save();
        } 

	}


}

?> 
