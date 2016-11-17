<?php
$username = "XR_API";
$password = "asdf1234";
$startdate = "2015-05-06";
$enddate = "2016-12-26";
$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_get_infos_pkg/">
        <ns1:SOAHeader>
            <ns1:Responsibility>CUX_SUPER_RESPKEY</ns1:Responsibility>
            <ns1:RespApplication>CUX</ns1:RespApplication>
            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
            <ns1:NLSLanguage>SIMPLIFIED CHINESE</ns1:NLSLanguage>
            <ns1:Org_Id>81</ns1:Org_Id>
        </ns1:SOAHeader>
     <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>XR_API</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">asdf1234</wsse:Password></wsse:UsernameToken></wsse:Security>
    </soap:Header>
    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_get_infos_pkg/get_info/">
        <ns2:InputParameters>
            <ns2:P_START_DATE></ns2:P_START_DATE>
            <ns2:P_END_DATE></ns2:P_END_DATE>
            <ns2:P_TYPE_CODE>CUSTOMER</ns2:P_TYPE_CODE>
        </ns2:InputParameters>
    </soap:Body>
</soap:Envelope>';
//$url = "http://szdctest.chinacache.com:8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
$url = "http://111.200.33.204:1574/80000/webservices/SOAProvider/plsql/cux_ws_eam_get_infos_pkg/";
//$url = "http://36.110.51.5:1574/8031/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
$soap_do = curl_init();

curl_setopt($soap_do, CURLOPT_URL, $url);

curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);

curl_setopt($soap_do, CURLOPT_TIMEOUT, 600);

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
echo ($result);
if (curl_errno($soap_do)) {
	echo 'Curl error: ' . curl_error($soap_do);
} else {
	
	$p = xml_parser_create();
	xml_parse_into_struct($p, $result, $vals, $indexs);
	xml_parser_free($p);
	
	$xml = new DOMDocument();
	$xml->loadXML($result);
	$result_clob_Dom = $xml->getElementsByTagName("X_RESULT_CLOB");
	$x_return_status = $xml->getElementsByTagName("X_RETURN_STATUS");
	$x_msg_data = $xml->getElementsByTagName("X_MSG_DATA");

	echo "x_return_status = " . $x_return_status->item(0)->nodeValue . "<br>";
	echo "x_msg_data = " . $x_msg_data->item(0)->nodeValue . "<br>";
	$xml_array = simplexml_load_string($result);
	$json_array = json_decode($result_clob_Dom->item(0)->nodeValue, true);
	$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
		'code' => 'ChinaCache'
	));
	foreach ($json_array as $key => $record) {
	echo $record;
		$customer_id_val = $record['CUSTOMER_ID'];
		$customer_name_val = $record['CUSTOMER_NAME'];
		$known_as_val = $record['KNOWN_AS'];
		$customer_class_val = $record['CUSTOMER_CLASS'];
		$country_val = $record['COUNTRY'];
		$province_val = $record['PROVINCE'];
		$city_val = $record['CITY'];
		$county_val = $record['COUNTY'];
		$address_val = $record['ADDRESS'];
		$owning_su_code_val = $record['OWNING_SU_CODE'];
		$owning_su_desc_val = $record['OWNING_SU_DESC'];
		$salers_id_val = $record['SALERS_ID'];
		$salers_name_val = $record['SALERS_NAME'];
		$salers_email_val = $record['SALERS_EMAIL'];
		$customer_business_val = $record['CUSTOMER_BUSINESS'];
		$organization_class_val = $record['ORGANIZATION_CLASS'];

		echo 'customer_name= ' . $customer_name_val . "<br>";
		echo 'product_code = ' . $product_code_val . "<br>";

		$check_customer = BeanFactory :: getBean('Accounts')->get_full_list('', "accounts_cstm.organization_number_c = '".$customer_id_val."'");
		echo "custom_id_val = ".$customer_id_val."<br>";
		//是否创建客户
		if (count($check_customer) == 0) {
			$customer_bean = BeanFactory :: newBean("Accounts");
			//业务类型默认为一般客户，给相应字段设置ID值
			$check_customer_biz_types = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_business_type',
				'name' => '客户'
			));

			if ($check_customer_biz_types) {
				$customer_bean->haa_codes_id1_c = $check_customer_biz_types->id;
			}

			// ERP别名设置给组织简称
			if(!empty($known_as_val)){
				$customer_bean->name = $known_as_val;
			}else{
				
				$customer_bean->name = $customer_name_val;
			}
			
			// ERP客户名称设置给组织全称
			$customer_bean->full_name_c = $customer_name_val;
			// ERP客户ID设置给组织#
			$customer_bean->organization_number_c = $customer_id_val;
			// 组织类型默认为外部
			$customer_bean->org_type_c = "EXTERNAL";

			// 根据ERP SU名称寻找对应组织ID，设置给销售组织（基础数据，正式上线时需要先导入资源系统）
			$check_sell_org = BeanFactory :: getBean('Accounts')->retrieve_by_string_fields(array (
				'full_name_c' => $owning_su_desc_val
			));
			if ($check_sell_org) {
				$customer_bean->account_id_c = $check_sell_org->id;
			}
			// 根据ERP 销售人员名称寻找对应联系人ID，设置给销售方人员（基础数据，正式上线时需要先导入资源系统）
			$check_seller = BeanFactory :: getBean('Contacts')->retrieve_by_string_fields(array (
				'chinese_name_c' => $salers_id_val
			));
			if ($check_seller) {
				$customer_bean->contact_id_c = $check_seller->id;
			}
			// 将ERP 销售员Email设置给负责人备注
			$customer_bean->responsible_person_note_c = $salers_email_val;

			// 将ERP 客户类别赋值给组织级别（基础数据，正式上线时需要先导入资源系统）
			$check_customer_level = BeanFactory :: getBean('HAA_Codes')->retrieve_by_string_fields(array (
				'code_type' => 'accounts_level',
				'name' => $organization_class_val
			));
			if ($check_customer_level) {
				$customer_bean->haa_codes_id_c = $check_customer_level->id;
			}

			$customer_bean->is_le_c = "0";
			$customer_bean->is_customer_c = "1";
			$customer_bean->billing_address_street = $address_val;
			$customer_bean->billing_address_city = $city_val;
			$customer_bean->billing_address_state = $province_val;
			$customer_bean->billing_address_country = $country_val;
			$customer_bean->shipping_address_street = $address_val;
			$customer_bean->shipping_address_city = $city_val;
			$customer_bean->shipping_address_state = $province_val;
			$customer_bean->shipping_address_country = $country_val;
			$customer_bean->attribute2_c = $salers_name_val;
			$customer_bean->attribute3_c = $salers_email_val;
			$customer_bean->attribute1_c = $owning_su_desc_val;
			//客户业务赋值给附加属性1
			$customer_bean->attribute1_c = $customer_business;
			$customer_bean->haa_frameworks_id_c = $frame_bean->id;
			$customer_bean->save();

		}else{
		   
			echo 'New Account ='.$customer_name_val.",customer_id = ".$check_customer[0]->id."<br>";
			$find_curstomer_id=$check_customer[0]->id;
			$customer_bean = BeanFactory :: getBean("Accounts",$find_curstomer_id);
			// ERP别名设置给组织简称
			if(!empty($known_as_val)){
				$customer_bean->name = $known_as_val;
			}else{
				
				$customer_bean->name = $customer_name_val;
			}
			$customer_bean->save();
		}
	}
}
?>
