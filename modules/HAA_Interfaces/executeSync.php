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



$Id=$_REQUEST['record'];
$instance_loc='iface_files/PUBLIC/';
if(isset($_SESSION["current_framework_code"])){
  $instance_loc='iface_files/'.$_SESSION["current_framework_code"].'/';
} 
//require_once('modules/HAA_Interfaces/'.$instance_loc.'createRevenueFromClaim.php');

//WS安全信息
$url = "http://stock.hand-china.com/hap/oauth/token?client_id=client2&client_secret=secret&grant_type=password&username=jessen&password=admin";
//创建一个新cURL资源 
$soap_do = curl_init();

curl_setopt($soap_do, CURLOPT_URL, $url);

curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);

curl_setopt($soap_do, CURLOPT_TIMEOUT, 60);

curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($soap_do, CURLOPT_POST, true);

/*curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postAllString);

curl_setopt($soap_do, CURLOPT_HTTPHEADER, array (
	'Content-Type: text/xml; charset=utf-8',
	'Content-Length: ' . strlen($postAllString)
));*/

//抓取URL并把它传递给浏览器
$result = curl_exec($soap_do);
if (curl_errno($soap_do)) {
	echo 'Curl error: ' . curl_error($soap_do);
}

$result_array=json_decode($result);
var_dump($result_array->access_token);
//关闭cURL资源，并且释放系统资源
curl_close($soap_do);
?>
