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



$WOId=$_REQUEST['record'];

require_once('modules/HAM_WO/createRevenueFromWO.php');

$haos_revenues_quotes_id=createRevenueFromWO($WOId);
ob_clean();
header('Location:index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$haos_revenues_quotes_id);
//echo($haos_revenues_quotes_id);
//if($haos_revenues_quotes_id){
	//echo '<script></script>';
	//$url = 'index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$haos_revenues_quotes_id;  
	// echo "<script language='javascript' 
	// type='text/javascript'>";  
	// echo "window.location.href=index.php?module=HAOS_Revenues_Quotes&action=EditView&record=".$haos_revenues_quotes_id;  
	// echo "</script>";  
 // header('Location:index.php?module=HAOS_Revenues_Quotes&action=EditView&record='.$haos_revenues_quotes_id);
//}
?>
