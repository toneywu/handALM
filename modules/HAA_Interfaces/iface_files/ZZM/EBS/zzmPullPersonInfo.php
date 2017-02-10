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
class zzmPullPersonInfo {

	function pullPerson($interfaceId,&$funcReturn,&$wsResult) {
		$funcReturn["return_status"]='0';
		$funcReturn["msg_data"]='';

	}

	function pullPerson($paramsArray){
		global $db,$app_list_strings;
		$return=array();


		$interfaceId=$paramsArray[0];

		$return["return_status"]='0';
		$return["msg_data"]='';
		$return["rtn_key"]='';
		$return["rtn_attr1"]='';
		$return["rtn_attr2"]='';
		$return["rtn_attr3"]='';
		$return["rtn_attr4"]='';
		$return["rtn_attr5"]='';
		$return["rtn_attr6"]='';
		$return["rtn_attr7"]='';
		$return["rtn_attr8"]='';

		$interfaceBean = BeanFactory :: getBean('HAA_Interfaces',$interfaceId);
		$url ='';
		$lastSyncDate ='';//yyyy-MM-ddTHH:mm:ss.SSSZ.
		if ($interfaceBean) { 
			$url =isset($interfaceBean->service_url)?$interfaceBean->service_url:'';
			$lastSyncDate=isset($interfaceBean->last_sync_date)?$interfaceBean->last_sync_date:'';
			$lastSyncDate=date_format(date_create($lastSyncDate),"yyyy-MM-ddTHH:mm:ss.SSSZ");
		}

		$postAllString = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:cus="http://www.zzmetro.com/pcbpel/adapter/db/top/CustomSoapHeader" xmlns:ex="http://xmlns.oracle.com/pcbpel/adapter/db/sp/ex_GetEmployeeInfo">
		<soapenv:Header>
		<cus:CustomSOAPHeader>
		<cus:conversationId></cus:conversationId>
		<cus:consumer></cus:consumer>
		<cus:provider></cus:provider>
		<cus:messageType></cus:messageType>
	</cus:CustomSOAPHeader>
</soapenv:Header>
<soapenv:Body>
<ex:InputParameters>
<ex:P_START_DATE>';

$postAllString .=$lastSyncDate.'</ex:P_START_DATE>
<ex:P_END_DATA></ex:P_END_DATA>
</ex:InputParameters>
</soapenv:Body>
</soapenv:Envelope>';

		//创建一个新cURL资源 
$soap_do = curl_init();

curl_setopt($soap_do, CURLOPT_URL, $url);

curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 300);

curl_setopt($soap_do, CURLOPT_TIMEOUT, 300);

curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($soap_do, CURLOPT_POST, true);

curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postAllString);

$headr = array();
$headr[] = 'Content-Type: text/xml; charset=utf-8';
$headr[] = 'Content-Length: '.strlen($postAllString);
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $headr);

	//抓取cURL并把它传递给浏览器
$wsResult = curl_exec($soap_do);
if (curl_errno($soap_do)) {
	$return["return_status"]='1';
	$return["msg_data"]=curl_error($soap_do);
	
}
		//关闭cURL资源，并且释放系统资源
curl_close($soap_do);
if ($return["return_status"]=='1'){
return $return;
}

	//生成XML解析对象
$p = xml_parser_create();
//开辟空间
xml_parse_into_struct($p, $wsResult, $vals, $indexs);
//释放对象
xml_parser_free($p);
//生成XML DOM解析对象
$xml = new DOMDocument();
//加载DOM
$xml->loadXML($result);
//获取报文节点   X_RETURN_STATUS
$x_return_status = $xml->getElementsByTagName("X_RETURN_STATUS");
//获取报文节点   X_MSG_DATA
$x_msg_data = $xml->getElementsByTagName("X_MSG_DATA");

if($x_return_status!='S'){
	$return["return_status"]='1';
	$return["msg_data"]=$x_msg_data;
	return $return;
}

$xml_array = new SimpleXMLElement($x_asset_out_data->item(0)->nodeValue);
foreach ($xml_array as $tmp) {
	echo 'RESOURCE_TYPE =' . $tmp->RESOURCE_TYPE . "<br>";
	echo 'RESOURCE_NUM =' . $tmp->RESOURCE_NUM . "<br>";
	echo 'RETURN_STATUS =' . $tmp->RETURN_STATUS . "<br>";
	echo 'ERROR_MESSAGE =' . $tmp->ERROR_MESSAGE . "<br>";
	//改为通过Bean保存到人员数据中
}
return $return;
}
?>
