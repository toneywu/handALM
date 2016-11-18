<?php
$username = "ERP_API";
$password = "qazwsx12345";
$startdate = "2015-05-06";
$enddate = "2016-07-26";
//echo "mdf password = " . md5($password);
$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
					    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/">
					        <ns1:SOAHeader>
					            <ns1:Responsibility>APPLICATION_DEVELOPER</ns1:Responsibility>
					            <ns1:RespApplication>FND</ns1:RespApplication>
					            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
					            <ns1:NLSLanguage>SIMPLIFIED CHINESE</ns1:NLSLanguage>
					            <ns1:Org_Id>81</ns1:Org_Id>
					        </ns1:SOAHeader>
					    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>ERP_API</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">qazwsx12345</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
					    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/get_basic_info/">
					        <ns2:InputParameters>
					            <ns2:P_START_DATE>2016-05-01</ns2:P_START_DATE>
					            <ns2:P_END_DATE>2016-12-01</ns2:P_END_DATE>
					            <ns2:P_TYPE_CODE>CONTRACT</ns2:P_TYPE_CODE>
					        </ns2:InputParameters>
					    </soap:Body>
					</soap:Envelope>';
//$url = "http://szdctest.chinacache.com:8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
//$url = "http://erpdevtest.chinacache.com:8031/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
$url = "http://111.200.33.204:1574/8031/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
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
	echo "x_msg_data = " . $x_msg_data->item(0)->nodeValue . "<br>";

	$xml_array = simplexml_load_string($result);
	$json_array = json_decode($result_clob_dom->item(0)->nodeValue, true);
	foreach ($json_array as $key => $record) {
		$h_contract_header_id_val = $record['CONTRACT_HEADER_ID'];
		$org_id_val = $record['ORG_ID'];
		$org_name_val = $record['ORG_NAME'];
		$instance_name_val = $record['INSTANCE_NAME'];
		$sold_to_org_id_val = $record['SOLD_TO_ORG_ID'];
		$sold_to_org_name_val = $record['SOLD_TO_ORG_NAME'];
		$sale_unit_val = $record['SALE_UNIT'];
		$salesrep_id_val = $record['SALESREP_ID'];
		$salesrep_name_val = $record['SALESREP_NAME'];
		$h_start_date_active_val = $record['START_DATE_ACTIVE'];
		$h_end_date_active_val = $record['END_DATE_ACTIVE'];
		$contract_type_val = $record['CONTRACT_TYPE'];
		$order_number_val = $record['ORDER_NUMBER'];
		$order_type_name_val = $record['ORDER_TYPE_NAME'];
		$sales_document_name_val = $record['SALES_DOCUMENT_NAME'];
		$flow_status_name_val = $record['FLOW_STATUS_NAME'];
		$frame_contract_num_val = $record['FRAME_CONTRACT_NUM'];
		echo "h_contract_header_id_val =" . $h_contract_header_id_val . "<br>";
		//判断是否数据库是否已经存在这个合同 如果存在则不插入
		$check_exists = BeanFactory :: getBean('AOS_Contracts')->get_full_list('', "aos_contracts_cstm.data_source_id_c = '$h_contract_header_id_val'");
		if (count($check_exists) == 0) {
			//系统中不存在才开始创建
			$newBean = BeanFactory :: getBean('AOS_Contracts');
			$newBean->data_source_c = $h_contract_header_id_val;
			//通过商业机会找商业机会的relatedId
			$opportunities_list = BeanFactory :: getBean('Opportunities')->get_full_list('', "opportunities.name = '$org_name_val'");
			if (count($opportunities_list) != 0) {
				$newBean->opportunity_id = $opportunities_list[0]->id;
			}

			//通过客户名称找客户的relatedId
			$opportunities_list = BeanFactory :: getBean('Accounts')->get_full_list('', "accounts.name = '$sold_to_org_name_val'");
			if (count($opportunities_list) != 0) {
				$newBean->contract_account_id = $opportunities_list[0]->id;
			}

			//business_type
			$business_list = BeanFactory :: getBean('HAA_Codes')->get_full_list('', "haa_codes.name = '$sale_unit_val'");
			if (count($business_list) != 0) {
				$newBean->haa_codes_id1_c = $business_list[0]->id;
			}

			//salesrep_name
			$salesrep_list = BeanFactory :: getBean('Users')->get_full_list('', "users.last_name = '$salesrep_name_val'");
			if (count($salesrep_list) != 0) {
				$newBean->assigned_user_id = $salesrep_list[0]->id;
			}

			//Media Type
			$media_type_list = BeanFactory :: getBean('HAA_Codes')->get_full_list('', "haa_codes.name = '$contract_type_val'");
			if (count($media_type_list) != 0) {
				$newBean->haa_codes_id2_c = $media_type_list[0]->id;
			}

			//TYPE
			$type_list = BeanFactory :: getBean('HAA_Codes')->get_full_list('', "haa_codes.name = '$order_type_name_val'");
			if (count($type_list) != 0) {
				$newBean->haa_codes_id_c = $type_list[0]->id;
			}

			//revision
			$revision_list = BeanFactory :: getBean('HPR_AM_Roles')->get_full_list('', "hpr_am_roles.name = '$frame_contract_num_val'");
			if (count($revision_list) != 0) {
				$newBean->revision_c = $revision_list[0]->id;
			}
			$newBean->name = $sales_document_name_val;
			$status_code = array_search($flow_status_name_val, $app_list_strings['contract_type_list'], true);
			$newBean->status = $status_code;
			$newBean->contract_number_c = $order_number_val;
			$newBean->start_date = $h_start_date_active_val;
			$newBean->end_date = $h_end_date_active_val;
			$newBean->data_source_id_c=$h_contract_header_id_val;
			$newBean->attribuet1_c=$org_name_val;
			$newBean->attribuet2_c=$sale_unit_val;
			$newBean->attribuet3_c=$contract_type_val;
			$newBean->attribuet4_c=$sales_document_name_val;
			$newBean->attribuet5_c=$frame_contract_num_val;
			$newBean->save();

			echo "header_id = " . $newBean->id . "<br>";
			echo "header_name=" . $sales_document_name_val . "<br>";
			echo "org_name_val=" . $org_name_val . "<br>";
			echo "sold_to_org_name_val=" . $sold_to_org_name_val . "<br>";
			echo "sale_unit_val=" . $sale_unit_val . "<br>";
			echo "salesrep_name_val=" . $salesrep_name_val . "<br>";
			echo "contract_type_val=" . $contract_type_val . "<br>";
			echo "order_type_name_val=" . $order_type_name_val . "<br>";
			echo "frame_contract_num_val=" . $frame_contract_num_val . "<br>";
			echo "start_date=" . $h_start_date_active_val . "<br>";


			foreach ($record['LINES'] as $line_key => $line_value) {
				$contract_line_id_val = $line_value['CONTRACT_LINE_ID'];
				$line_num_val = $line_value['LINE_NUM'];
				$contract_header_id_val = $line_value['CONTRACT_HEADER_ID'];
				$item_number_val = $line_value['ITEM_NUMBER'];
				$inventory_item_id_val = $line_value['INVENTORY_ITEM_ID'];
				$inventory_item_name_val = $line_value['INVENTORY_ITEM_NAME'];
				$parent_description_val = $line_value['PARENT_DESCRIPTION'];
				$open_type_val = $line_value['OPEN_TYPE'];
				$uom_code_val = $line_value['UOM_CODE'];
				$quantity_val = $line_value['QUANTITY'];
				$start_date_active_val = $line_value['START_DATE_ACTIVE'];
				$end_date_active_val = $line_value['END_DATE_ACTIVE'];
				$formula_type_code_val = $line_value['FORMULA_TYPE_CODE'];
				echo "line_id=" . $contract_line_id_val . "<br>";
				echo "LINE_NUMBER=" . $line_num_val . "<br>";
				echo "ITEM_NUMBER=" . $item_number_val . "<br>";
				echo "ITEM_NAME=" . $inventory_item_name_val . "<br>";
				$check_line_exists = BeanFactory :: getBean('AOS_Products_Quotes')->get_full_list('', "aos_products_quotes.product_source_id_c = '$contract_line_id_val'");
				if (count($check_line_exists) == 0) {
					$newLineBean = BeanFactory :: getBean('AOS_Products_Quotes');
					$newLineBean->parent_id = $newBean->id;
					$newLineBean->data_source_id_c = $contract_line_id_val;
					$newLineBean->name = $inventory_item_name_val;
					//INVENTORY_ITEM_name
					$item_list = BeanFactory :: getBean('AOS_Products')->get_full_list('', "aos_products.part_number = '$item_number_val'");
					if (count($item_list) != 0) {
						$newLineBean->product_id = $item_list[0]->id;
						echo "product_id = ".$item_list[0]->id."<br>";
					}
					$newLineBean->product_discount = $parent_description_val;
					$newLineBean->vat_amt = $open_type_val;
					$newLineBean->product_qty = $quantity_val;
					$newLineBean->effective_start_c = $start_date_active_val;
					$newLineBean->effective_end_c = $end_date_active_val;
					$newLineBean->parent_type = 'AOS_Contracts';
					$newLineBean->product_source_id_c=$contract_line_id_val;
					//
					$newLineBean->save();
				}
			}
		}
	}
}
?>
