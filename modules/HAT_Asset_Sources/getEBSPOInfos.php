<?php
$username = "sysadmin";
$password = "welcome8";
$startdate = "2015-05-06";
$enddate = "2016-07-26";
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
					            <ns2:P_START_DATE>2013-04-01</ns2:P_START_DATE>
					            <ns2:P_END_DATE>2016-09-30</ns2:P_END_DATE>
					            <ns2:P_TYPE_CODE>PO</ns2:P_TYPE_CODE>
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
	$result_clob_dom = $xml->getElementsByTagName("X_RESULT_CLOB");
	$x_return_status = $xml->getElementsByTagName("X_RETURN_STATUS");
	$x_msg_data = $xml->getElementsByTagName("X_MSG_DATA");

	echo "x_return_status = " . $x_return_status->item(0)->nodeValue . "<br>";
	echo "x_msg_data      = " . $x_msg_data->item(0)->nodeValue . "<br>";

	$result_clob = $result_clob_dom->item(0)->nodeValue;
	$xml_array = simplexml_load_string($result);
	$json_array = json_decode($xml->getElementsByTagName("X_RESULT_CLOB")->item(0)->nodeValue, true);
	//业务框架
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	$frame_id = $frame_bean->id;
	
	//处理数据
	if ($result_clob != null) {
		foreach ($json_array as $key => $record) {
			$po_header_id_val = $record['PO_HEADER_ID'];
			$po_number_val = $record['PO_NUMBER'];
			$vendor_name_val = $record['VENDOR_NAME'];
			$comments_val = $record['COMMENTS'];
			$org_name_val = $record['ORG_NAME'];
			$instance_name_val = $record['INSTANCE_NAME'];

			foreach ($record['LINES'] as $line_key => $line_value) {
				
				//判断是否数据库是否已经存在这个订单行 如果存在则不插入
				$po_line_id_val = $line_value['PO_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$po_header_id_val = $line_value['PO_HEADER_ID'];
				$inventory_item_id_val = $line_value['ITEM_ID'];
				$item_description_val = $line_value['ITEM_DESCRIPTION'];
				$unit_val = $line_value['UNIT'];
				$quantity_val = $line_value['QUANTITY'];
				$unit_price_val = $line_value['UNIT_PRICE'];
				$category_name_val = $line_value['CATEGORY_NAME'];
				$prod_code_val = $line_value['PROD_CODE'];
				$prod_name_val = $line_value['PROD_NAME'];
				
				echo "header_id   = " . $po_header_id_val . "<br>";
				echo "line_number = " . $line_num_val . "<br>";
				echo "item_name   = " . $item_description_val . "<br>";
				echo "line_id     = " . $po_line_id_val . "<br>";

				$check_exists = BeanFactory :: getBean('HAT_Asset_Sources')->get_full_list('', "hat_asset_sources.source_id = '$po_line_id_val'");

				if ($check_exists == 0) {
					$newLineBean = BeanFactory :: newBean('HAT_Asset_Sources');
					$newLineBean->name = $po_number_val . ':' . $line_num_val;
					$newLineBean->header_num = $po_number_val;
					$newLineBean->supplier_desc = $vendor_name_val;
					$newLineBean->description = $comments_val;
					$newLineBean->source_type = $instance_name_val;
					$newLineBean->line_num = $line_num_val;
					$newLineBean->item_num = $inventory_item_id_val;
					$newLineBean->line_qty = $quantity_val;
					$newLineBean->line_price = $unit_price_val;
					$newLineBean->source_reference = $prod_name_val;
					$newLineBean->haa_frameworks_id = $frame_id;
					$newLineBean->source_id = $po_line_id_val;
					$newLineBean->save();
				}
			}
		}
	}
}
?>
