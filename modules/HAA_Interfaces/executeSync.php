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


require_once('modules/HAA_Interfaces/haaInterfaceBase.php');
$interfaceId=$_REQUEST['record'];
$paramsArray[0]=$interfaceId;//参数数组第一个固定传入接口ID
$interfaceBaseClass= new haaInterfaceBase();

$interfaceBaseClass->execute_Interface_Processor($paramsArray);
$return=$interfaceBaseClass->interfaceProcessReturn;

if($return["return_status"]=='0'){

	header('Location: index.php?module=HAA_Interfaces&action=DetailView&record='.$interfaceId);
}
else{
	die('执行接口出错:'.$return["msg_data"]);
}
?>
