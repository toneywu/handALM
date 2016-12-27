<?php
class PushAssetsUtil {
	var $username = "sysadmin";
	var $password = "welcome8";
	var $startdate = "2015-05-06";
	var $enddate = "2016-07-26";
	var $url = "http://111.200.33.205:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";

	public function gernerat_xml_str($records, $username, $password, $startdate, $enddate) {
		$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
																	    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_transfer_asset_pkg/">
																	        <ns1:SOAHeader>
																	            <ns1:Responsibility>CUX_SUPER_RESPKEY</ns1:Responsibility>
																	            <ns1:RespApplication>CUX</ns1:RespApplication>
																	            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
																	            <ns1:NLSLanguage>AMERICAN</ns1:NLSLanguage>
																	            <ns1:Org_Id>81</ns1:Org_Id>
																	        </ns1:SOAHeader>
																	    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1">' .
		'<wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">' .
		'<wsse:Username>' . $username . '</wsse:Username>' .
		'<wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">' . $password . '</wsse:Password>' .
		'</wsse:UsernameToken>' .
		'</wsse:Security>' .
		'</soap:Header>
			 <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_transfer_asset_pkg/push_asset/">
			<ns2:InputParameters>
			<ns2:P_ASSET_INFO_DATA><ROOT LANG="CHS" SECURITY="TRUE" VERSION="100"><HEADERS>';

		if (is_string($records)) {
			$records = array (
				$records
			);
		}

		$loopInput = "";
		foreach ($records as $record) {
			//获取满足添加的BEAN集合
			$assetBeanList = BeanFactory :: newBean("HAT_Assets")->get_full_list('', "hat_assets.id='" . $record . "'", "");
			$assetBean = $assetBeanList[0];
			//foreach ($assetBeanList as $assetBean) {
			$assetBean->load_relationship('hat_asset_locations_hat_assets');
			$locationsIds = $assetBean->hat_asset_locations_hat_assets->get();
			$bean_location = BeanFactory :: getBean('HAT_Asset_Locations', $locationsIds[0]);
			$mait_sites_bean = BeanFactory :: getBean('HAM_Maint_Sites', $bean_location->ham_maint_sites_id);
			if(empty($assetBean->fixed_asset_id)){
				$loopInput = '<HEADER>';
				$guid = create_guid();
				$loopInput = $loopInput . '<IF_ID>' . $guid . '</IF_ID>';
				$loopInput = $loopInput . '<FRAMEWORK_CODE>' . $assetBean->framework . '</FRAMEWORK_CODE>';
				$loopInput = $loopInput . '<ASSET_GROUP_NAME>' . $assetBean->asset_group . '</ASSET_GROUP_NAME>';
				$loopInput = $loopInput . '<NAME>' . $assetBean->name . '</NAME>';
				$loopInput = $loopInput . '<ASSET_NUMBER>' . $assetBean->asset_number . '</ASSET_NUMBER>';
				$loopInput = $loopInput . '<SERIAL_NUMBER>' . $assetBean->serial_number . '</SERIAL_NUMBER>';
				$loopInput = $loopInput . '<ASSET_DESC>' . $assetBean->asset_desc . '</ASSET_DESC>';
				$loopInput = $loopInput . '<ASSET_CATEGORY>' . $assetBean->asset_category . '</ASSET_CATEGORY>';
				$loopInput = $loopInput . '<ASSET_NAME>' . $assetBean->asset_name . '</ASSET_NAME>';
				$loopInput = $loopInput . '<ASSET_BRAND>' . $assetBean->brand . '</ASSET_BRAND>';
				$loopInput = $loopInput . '<ASSET_MODEL>' . $assetBean->model . '</ASSET_MODEL>';
				$loopInput = $loopInput . '<ASSET_OWNING_ORG_NAME>' . $assetBean->cost_center . '</ASSET_OWNING_ORG_NAME>';
				$loopInput = $loopInput . '<ASSET_LOCATION_NAME>' . $mait_sites_bean->name . '</ASSET_LOCATION_NAME>';
				$loopInput = $loopInput . '<ASSET_SOURCE_TYPE>' . $assetBean->source_type . '</ASSET_SOURCE_TYPE>';
				$loopInput = $loopInput . '<ASSET_SOURCE_ORDER></ASSET_SOURCE_ORDER>';
				$loopInput = $loopInput . '<ASSET_SOURCE_LINE></ASSET_SOURCE_LINE>';
				$loopInput = $loopInput . '<ASSET_SOURCE_REFERENCE>' . $assetBean->source_ref . '</ASSET_SOURCE_REFERENCE>';
				$loopInput = $loopInput . '<ASSET_SOURCE_SUPPLIER>' . $assetBean->supplier_org . '</ASSET_SOURCE_SUPPLIER>';
				$loopInput = $loopInput . '<ASSET_SOURCE_PRICE>' . $assetBean->original_cost . '</ASSET_SOURCE_PRICE>';
				$loopInput = $loopInput . '<FA_CATEGORY></FA_CATEGORY>';
				$loopInput = $loopInput . '<FA_BOOK_CODE></FA_BOOK_CODE>';
				$loopInput = $loopInput . '<FA_ASSET_NUMBER></FA_ASSET_NUMBER>';
				$loopInput = $loopInput . '<ASSET_DATE_IN_SERVICE>' . $assetBean->start_date . '</ASSET_DATE_IN_SERVICE>';
				$loopInput = $loopInput . '<ATTRIBUTE1>' . $assetBean->attribute1 . '</ATTRIBUTE1>';
				$loopInput = $loopInput . '<ATTRIBUTE2>' . $assetBean->attribute2 . '</ATTRIBUTE2>';
				$loopInput = $loopInput . '<ATTRIBUTE3>' . $assetBean->attribute3 . '</ATTRIBUTE3>';
				$loopInput = $loopInput . '<ATTRIBUTE4>' . $assetBean->attribute4 . '</ATTRIBUTE4>';
				$loopInput = $loopInput . '<ATTRIBUTE5>' . $assetBean->attribute5 . '</ATTRIBUTE5>';
				$loopInput = $loopInput . '<ATTRIBUTE6>' . $assetBean->attribute6 . '</ATTRIBUTE6>';
				$loopInput = $loopInput . '<ATTRIBUTE7>' . $assetBean->attribute7 . '</ATTRIBUTE7>';
				$loopInput = $loopInput . '<ATTRIBUTE8>' . $assetBean->attribute8 . '</ATTRIBUTE8>';
				$loopInput = $loopInput . '<ATTRIBUTE9>' . $assetBean->attribute9 . '</ATTRIBUTE9>';
				$loopInput = $loopInput . '<ATTRIBUTE10>' . $assetBean->attribute10 . '</ATTRIBUTE10>';
				$loopInput = $loopInput . '<DATA_STATUS>N</DATA_STATUS>';
				$loopInput = $loopInput . '<DATA_SOURCE_CODE>handALM</DATA_SOURCE_CODE>';
				$loopInput = $loopInput . '<DATA_SOURCE_REFERENCE>' . $assetBean->asset_desc . '</DATA_SOURCE_REFERENCE>';
				$loopInput = $loopInput . '<DATA_SOURCE_ID>' . $assetBean->id . '</DATA_SOURCE_ID>';
				$loopInput = $loopInput . '</HEADER>';
				$postAllString = $postAllString . '' . "$loopInput";
				$loopInput = "";
			}
		}
		$loopInput = $loopInput . "</HEADERS></ROOT></ns2:P_ASSET_INFO_DATA></ns2:InputParameters></soap:Body></soap:Envelope>";
		$postAllString = $postAllString . '' . "$loopInput";

		return $postAllString;
	}

	public function call_ws($postAllString,$url) {
		$resultArray="";
		//创建一个新cURL资源 
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

		//抓取URL并把它传递给浏览器
		$result = curl_exec($soap_do);
		if (curl_errno($soap_do)) {
			echo 'Curl error: ' . curl_error($soap_do);
		}
		//echo 'result = '.var_dump($result);
		//关闭cURL资源，并且释放系统资源
		curl_close($soap_do);
		//生成XML解析对象
		$p = xml_parser_create();
		//开辟空间
		xml_parse_into_struct($p, $result, $vals, $indexs);
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
		//获取报文节点   X_ASSET_OUT_DATA
		$x_asset_out_data = $xml->getElementsByTagName("X_ASSET_OUT_DATA");
		//输出
		echo "x_return_status = " . $x_return_status->item(0)->nodeValue . "<br>";
		//echo "x_msg_data = " . $x_msg_data->item(0)->nodeValue . "<br>";
		//echo "x_asset_out_data = " . $x_asset_out_data->item(0)->nodeValue . "<br>";
		$error_message = '';
		$xml_array = new SimpleXMLElement($x_asset_out_data->item(0)->nodeValue);
		foreach ($xml_array as $tmp) {
			//echo 'RESOURCE_TYPE =' . $tmp->RESOURCE_TYPE . "<br>";
			//echo 'RESOURCE_NUM =' . $tmp->RESOURCE_NUM . "<br>";
			//echo 'RETURN_STATUS =' . $tmp->RETURN_STATUS . "<br>";
			//echo 'ERROR_MESSAGE =' . $tmp->ERROR_MESSAGE . "<br>";
			if($tmp->RETURN_STATUS=="S"||$tmp->RETURN_STATUS==""){
				$error_message=$error_message."资产编号:".$tmp->RESOURCE_NUM."创建EBS资产成功;";
			}else{
				$error_message=$error_message."资产编号:".$tmp->RESOURCE_NUM."创建EBS资产出现问题:".$tmp->ERROR_MESSAGE.";";
			}
			
			//成功后怎么办
		}
		return $error_message;
	}

}
?>