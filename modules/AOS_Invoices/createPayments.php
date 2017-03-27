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
    
	require_once('modules/AOS_Invoices/createPaymentsBean.php');
	$predata = $_POST;
	// foreach ($predata as $value) {
	// 	echo $value;
	// }
	//echo json_encode($predata);
	if($predata['view']=='DetailView' && $predata['type']=='create'){
		$data = $predata['data'];
		$result = validateAosInvoices($data);
		if($result['return_status']=='S'){
			$result = createPayment($data); 
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}	
	}else if($predata['view']=='DetailView' && $predata['type']=='check'){
		$data = $predata['data'];			
		$result = validataCheck($data);
		echo json_encode($result);
	}else if($predata['view']=='ListView' && $predata['type']=='create'){
		$data = $predata['data'];
		$result = validateAosInvoices($data);
		//echo json_encode($result);
		if($result['return_status']=='S'){
			$result = createPayment($data);
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}		
	}else if($predata['view']=='ListView' && $predata['type']=='check'){
		$data = $predata['data'];			
		$result = validataCheck($data);
		echo json_encode($result);
	}



	
	
	
