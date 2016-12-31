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



$interfaceId=$_REQUEST['record'];
//require_once('modules/HAA_Interfaces/'.$instance_loc.'createRevenueFromClaim.php');
require_once('modules/HAA_Interfaces/syncCommonUtl.php');
$interfaceInfo=getInterfaceInfo($interfaceId);
$execute_func_files=$interfaceInfo ["execute_func_files"];
$execute_func_name=$interfaceInfo ["execute_func_name"];
$systemId=$interfaceInfo ["haa_codes_id_c"];
$codeBean=BeanFactory::getBean('HAA_Codes',$systemId);
if($codeBean){
$systemCode=$codeBean->code_tag;
}
$instance_loc='';
if(isset($_SESSION["current_framework_code"])){
	$instance_loc='iface_files/'.$_SESSION["current_framework_code"].'/'.$systemCode.'/';
	$include_file='modules/HAA_Interfaces/'.$instance_loc.$execute_func_files.'.php';
} 
if(!file_exists($include_file)){
	$instance_loc='iface_files/PUBLIC/'.$systemCode.'/';
	$include_file='modules/HAA_Interfaces/'.$instance_loc.$execute_func_files.'.php';
}
if(!file_exists($include_file)){
	die('未能在服务器路径下找到接口执行文件，请联系技术运维人员。');
}
require_once($include_file);

$ifaceClass = new $execute_func_files();
$return = $ifaceClass->$execute_func_name($interfaceId);
if($return["error_code"]=='0'){
	header('Location: index.php?module=HAA_Interfaces&action=DetailView&record='.$interfaceId);
}
else{
	die('执行接口出错:'.$return["error_msg"]);
}
?>
