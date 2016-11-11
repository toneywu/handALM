<?php
$username = "sysadmin";
$password = "welcome8";
$startdate = "2015-05-06";
$enddate = "2016-07-26";
//echo "mdf password = " . md5($password) . "<br>";
$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
					    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/">
					        <ns1:SOAHeader>
					            <ns1:Responsibility>CUX_SUPER_RESPKEY</ns1:Responsibility>
					            <ns1:RespApplication>CUX</ns1:RespApplication>
					            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
					            <ns1:NLSLanguage>AMERICAN</ns1:NLSLanguage>
					            <ns1:Org_Id>81</ns1:Org_Id>
					        </ns1:SOAHeader>
					    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>sysadmin</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">welcome8</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
					    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/get_basic_info/">
					        <ns2:InputParameters>
					            <ns2:P_START_DATE>2016-01-01</ns2:P_START_DATE>
					            <ns2:P_END_DATE>2016-09-01</ns2:P_END_DATE>
					            <ns2:P_TYPE_CODE>PRODUCT</ns2:P_TYPE_CODE>
					        </ns2:InputParameters>
					    </soap:Body>
					</soap:Envelope>';
//$url = "http://szdctest.chinacache.com:8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
$url = "http://111.200.33.204:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
$soap_do = curl_init();

curl_setopt($soap_do, CURLOPT_URL, $url);

curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);

curl_setopt($soap_do, CURLOPT_TIMEOUT, 60);

curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt($soap_do, CURLOPT_POST, true);

curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postAllString);

curl_setopt($soap_do, CURLOPT_HTTPHEADER, array (
	'Content-Type: text/xml; charset=utf-8',
	'Content-Length: ' . strlen($postAllString)
));

$result = curl_exec($soap_do);
if (curl_errno($soap_do)) {
	echo 'Curl error: ' . curl_error($soap_do);
} else {

	$p = xml_parser_create();
	xml_parse_into_struct($p, $result, $vals, $indexs);
	xml_parser_free($p);

	$xml = new DOMDocument();
	$xml->loadXML($result);
	$x_return_status = $xml->getElementsByTagName("X_RETURN_STATUS");
	$x_msg_data = $xml->getElementsByTagName("X_MSG_DATA");

	$GLOBALS['log']->error("返回状态 = " . $x_return_status->item(0)->nodeValue);
	$GLOBALS['log']->error("返回消息 = " . $x_msg_data->item(0)->nodeValue);

	echo "返回消息 = " . $x_msg_data->item(0)->nodeValue . "<br>";
	echo "返回状态 = " . $x_return_status->item(0)->nodeValue . "<br>";

	$result_clob = $xml->getElementsByTagName("X_RESULT_CLOB")->item(0)->nodeValue;
	$json_array = json_decode($result_clob, true);
	$uomBean = BeanFactory :: getBean('HAA_UOM')->get_full_list('', "HAA_UOM.uom_code = 'EA'");
	$uom_id = null;

	if (!empty ($uomBean)) {
		$uom_id = $uomBean->id;
	}
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	if ($result_clob != null) {
		foreach ($json_array as $key => $record) {	
			foreach ($record as $record_key => $record_value) {

				$product_code_val = $record['PRODUCT_CODE'];
				$product_id_val = $record['PRODUCT_ID'];
				$product_name_val = $record['PRODUCT_NAME'];
				$item_category_val = $record['ITEM_CATEGORY'];
				$product_status_name_val = $record['PRODUCT_STATUS_NAME'];
				$item_number_val = $record['ITEM_NUMBER'];
				$parent_product = $record['PARENT_PRODUCT'];
				$primary_uom_code = $record['PRIMARY_UOM_CODE'];
				echo 'Product_Name= ' . $product_name_val . "<br>".',product_code = ' . $product_code_val.',item_number = ' . $item_number_val;
				$check_product = BeanFactory :: getBean('AOS_Products')->get_full_list('', "aos_products.part_number = '{$product_code_val}'");
				//是否创建产品类别
				if (count($check_product) == 0) {
					$product_bean = BeanFactory :: newBean("AOS_Products");
					$product_bean->name = $product_name_val;
					$product_bean->part_number = $product_code_val;
					$product_bean->description = $product_status_name_val;
					$product_bean->haa_uom_id_c = $uom_id;
					$product_bean->haa_frameworks_id_c = $frame_bean->id;
					//来源字段********
					$product_bean->data_source_code_c = 'EBS';
					$product_bean->data_source_reference_c = 'PRO_PRODUCT_BASE_INFO';
					$product_bean->data_source_id_c = $product_id_val;
					$product_bean->description = $parent_product;
					//*********
					$check_product_category = BeanFactory :: getBean('AOS_Product_Categories')->get_full_list('', "aos_product_categories.name = '{$item_category_val}'");
					//是否创建产品类别
					if (count($check_product_category) == 0) {
						$product_category = BeanFactory :: newBean("AOS_Product_Categories");
						$product_category->name = $item_category_val;
						//
						$product_category->data_source_code_c = 'EBS';
						$product_category->data_source_reference_c = 'PRO_PRODUCT_BASE_INFO';
						$product_category->data_source_id_c = $item_category_val;
						//
						$product_category->save();
						$product_bean->aos_product_category_id = $product_category->id;
					} else {
						$product_bean->aos_product_category_id = $check_product_category[0]->id;
					}
					//通过单位找到单位的id
					$uom_bean = BeanFactory :: getBean('HAA_UOM')->retrieve_by_string_fields(array (
										    'name' => $primary_uom_code
					));	
					$product_bean->haa_uom_id_c=$uom_bean->id;
					if (empty($uom_bean)){
						echo "单位为空 请先维护.";
					}
					$product_bean->save();
				}

			}
		}
	}
}
?>
