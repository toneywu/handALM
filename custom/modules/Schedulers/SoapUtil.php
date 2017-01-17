<?php 
class SoapUtil{
	/*
	*����8031 WS-Security��Ϣ
	*/
	 $username_jt = "ERP_API";
	 $password_jt = "erp123qwe";
	//var $url_jt = "http://36.110.51.4:1574/8000/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
	 $url_jt = "http://111.200.33.204:1574/8000/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
	 $resp_key_jt="APPLICATION_DEVELOPER";
	 $resp_appl_jt="FND";
	 $security_jt="STANDARD";
	 $language_jt="SIMPLIFIED CHINESE";
	 $org_id_jt="81";
	/*
	*������ʽ���� WS-Security��Ϣ
	*/
	 $username_xr = "XR_API";
	 $password_xr = "asdf1234";
	 $url_xr      = "http://111.200.33.204:1574/80000/webservices/SOAProvider/plsql/cux_ws_eam_get_infos_pkg/";
	 $resp_key_xr ="CUX_SUPER_RESPKEY";
	 $resp_appl_xr="CUX";
	 $security_xr ="STANDARD";
	 $language_xr ="SIMPLIFIED CHINESE";
	 $org_id_xr   ="81";
	
	function call_soap_ws($ws_type_code,$ws_env){
		if($ws_env=='JT'){
		     curl_setopt($soap_do, CURLOPT_URL, $url_jt);
			 /*echo $this->resp_key_jt."<br>";
			 echo $this->resp_appl_jt."<br>";
			 echo $this->security_jt."<br>";
			 echo $this->language_jt."<br>";*/
			//����ģ���½�� ����
			
						/*$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
					    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/">
					        <ns1:SOAHeader>
					            <ns1:Responsibility>'.$this->resp_key_jt.'</ns1:Responsibility>
					            <ns1:RespApplication>'.$this->resp_appl_jt.'</ns1:RespApplication>
					            <ns1:SecurityGroup>'.$this->security_jt.'</ns1:SecurityGroup>
					            <ns1:NLSLanguage>'.$this->language_jt.'</ns1:NLSLanguage>
					            <ns1:Org_Id>81</ns1:Org_Id>
					        </ns1:SOAHeader>
					    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>'.$this->username_jt.'</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">'.$this->password_jt.'</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
					    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/get_basic_info/">
					        <ns2:InputParameters>
					            <ns2:P_START_DATE>2010-05-01</ns2:P_START_DATE>
					            <ns2:P_END_DATE>2016-12-31</ns2:P_END_DATE>
					            <ns2:P_TYPE_CODE>'.$ws_type_code.'</ns2:P_TYPE_CODE>
					        </ns2:InputParameters>
					    </soap:Body>
					</soap:Envelope>';*/
					
					$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
											<soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/">
												<ns1:SOAHeader>
													<ns1:Responsibility>'.$this->resp_key_jt.'</ns1:Responsibility>
													<ns1:RespApplication>'.$this->resp_appl_jt.'</ns1:RespApplication>
													<ns1:SecurityGroup>'.$this->security_jt.'</ns1:SecurityGroup>
													<ns1:NLSLanguage>'.$this->language_jt.'</ns1:NLSLanguage>
													<ns1:Org_Id>81</ns1:Org_Id>
												</ns1:SOAHeader>
											<wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>ERP_API</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">erp123qwe</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
											<soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_eam_basic_info_pkg/get_basic_info/">
												<ns2:InputParameters>
													  <ns2:P_START_DATE>2010-01-01</ns2:P_START_DATE>
													<ns2:P_END_DATE>2016-12-31</ns2:P_END_DATE>
													<ns2:P_TYPE_CODE>'.$ws_type_code.'</ns2:P_TYPE_CODE>
												</ns2:InputParameters>
											</soap:Body>
										</soap:Envelope>';
					
					
					
		}
		else if($ws_env=='XR'){
			
				echo "XR"."<br>";
				echo "ws_env=".$ws_type_code."<br>";
				echo "ws_env=".$this->username_xr."<br>";
				echo "url = ".$this->password_xr."<br>";
		        curl_setopt($soap_do, CURLOPT_URL, $url_xr);
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
										<ns2:P_START_DATE>2015-01-01</ns2:P_START_DATE>
										<ns2:P_END_DATE>2016-12-31</ns2:P_END_DATE>
										<ns2:P_TYPE_CODE>'.$ws_type_code.'</ns2:P_TYPE_CODE>
									</ns2:InputParameters>
								</soap:Body>
							</soap:Envelope>';
			}
		
		
				$soap_do = curl_init();
				if($ws_env=='JT'){
					$url = $this->url_jt;
					 
				}else{
					$url=$this->url_xr;
				}
				
				$GLOBALS['log']->infor($postAllString);
				
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
					$GLOBALS['log']->infor("x_return_status=".$x_return_status->item(0)->nodeValue);
					$GLOBALS['log']->infor("x_msg_data=".$x_msg_data->item(0)->nodeValue);
					$xml_array = simplexml_load_string($result);
					$json_array = json_decode($result_clob_dom->item(0)->nodeValue, true);
					}
					return $json_array;
			}
}
?>