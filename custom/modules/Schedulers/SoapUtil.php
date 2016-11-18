<?php 
class SoapUtil(){
	/*
	*集团8031 WS-Security信息
	*/
	public $username_jt = "ERP_API";
	public $password_jt = "qazwsx12345";
	public $url_jt = "http://111.200.33.204:1574/8031/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
	public $resp_key_jt="APPLICATION_DEVELOPER";
	public $resp_appl_jt="FND";
	public $security_jt="STANDARD";
	public $language_jt="SIMPLIFIED CHINESE";
	public $org_id_jt="81";
	/*
	*欣润正式环境 WS-Security信息
	*/
	public $username_xr = "XR_API";
	public $password_xr = "asdf1234";
	public $url_xr = "http://111.200.33.204:1574/80000/webservices/SOAProvider/plsql/cux_ws_eam_get_infos_pkg/";
	public $resp_key_xr="CUX_SUPER_RESPKEY";
	public $resp_appl_xr="CUX";
	public $security_xr"STANDARD";
	public $language_xr="SIMPLIFIED CHINESE";
	public $org_id_xr="81";
	
	public call_soap_ws($ws_type_code,$ws_env){
		if($ws_env="JT"){
			//集团模拟登陆的 报文
			$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
							<soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/">
								<ns1:SOAHeader>
									<ns1:Responsibility>'.$this->resp_key_jt.'</ns1:Responsibility>
									<ns1:RespApplication>'.$this->resp_appl_jt.'</ns1:RespApplication>
									<ns1:SecurityGroup>'.$this->security_jt.'</ns1:SecurityGroup>
									<ns1:NLSLanguage>'.$this->language_jt.'</ns1:NLSLanguage>
									<ns1:Org_Id>'.$this->org_id_jt.'</ns1:Org_Id>
								</ns1:SOAHeader>
								<wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" 
											   xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" 
											   xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1">
									<wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" 
										   xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
										   <wsse:Username>'.$username_jt.'</wsse:Username>
										   <wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.$password_jt.'</wsse:Password>
									</wsse:UsernameToken>
								</wsse:Security>
							</soap:Header>
							<soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/get_basic_info/">
								<ns2:InputParameters>
									<ns2:P_START_DATE>2016-05-01</ns2:P_START_DATE>
									<ns2:P_END_DATE>2016-12-31</ns2:P_END_DATE>
									<ns2:P_TYPE_CODE>'.$ws_type_code.'</ns2:P_TYPE_CODE>
								</ns2:InputParameters>
							</soap:Body>
						</soap:Envelope>';
		}else if($ws_env="XR"){
			//欣润模拟登陆的 报文
			$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
								<soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_get_infos_pkg/">
									<ns1:SOAHeader>
										<ns1:Responsibility>'$this->resp_key_xr'</ns1:Responsibility>
										<ns1:RespApplication>'$this->resp_appl_xr'</ns1:RespApplication>
										<ns1:SecurityGroup>'$this->security_xr'</ns1:SecurityGroup>
										<ns1:NLSLanguage>'$this->language_xr'</ns1:NLSLanguage>
										<ns1:Org_Id>'$this->org_id_xr'</ns1:Org_Id>
									</ns1:SOAHeader>
								 <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>XR_API</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">asdf1234</wsse:Password></wsse:UsernameToken></wsse:Security>
								</soap:Header>
								<soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_get_infos_pkg/get_info/">
									<ns2:InputParameters>
										<ns2:P_START_DATE></ns2:P_START_DATE>
										<ns2:P_END_DATE></ns2:P_END_DATE>
										<ns2:P_TYPE_CODE>'.$ws_type_code.'</ns2:P_TYPE_CODE>
									</ns2:InputParameters>
								</soap:Body>
							</soap:Envelope>';
		}
		
		$soap_do = curl_init();
		curl_setopt($soap_do, CURLOPT_URL, $url);
		curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($soap_do, CURLOPT_TIMEOUT, 600);
		curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($soap_do, CURLOPT_POST, true);
		curl_setopt($soap_do, CURLOPT_POSTFIELDS, $postAllString);
		curl_setopt($soap_do, CURLOPT_HTTPHEADER, array ('Content-Type: text/xml; charset=utf-8',
														'Content-Length: ' . strlen($postAllString)));

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
			$x_msg_data		 = $xml->getElementsByTagName("X_MSG_DATA");
			
			echo "x_return_status = " . $x_return_status->item(0)->nodeValue . "<br>";
			echo "x_msg_data = " . $x_msg_data->item(0)->nodeValue . "<br>";
		}	
	}
	
	
}

?>