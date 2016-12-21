<?php


/*
 * Created on 2016-9-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class UpdateAsset {

	function update_fix_asset($record, $cost_cetner, $location,$production) {
		//echo '\n'.'record = ' . $record . "\n";
		//echo 'cost_cetner = ' . $cost_cetner."\n";
		//echo 'location = ' . $location .  "\n";
		//echo 'production = ' . $production .  "\n";
		$result_array =array();
		$username = "sysadmin";
		$password = "welcome8";
		$url = "http://111.200.33.205:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";

		$asset_bean = BeanFactory :: getBean('HAT_Assets')->retrieve_by_string_fields(array (
			'id' => $record
		));
		//echo 'fixed_asset_id = '.$asset_bean->fixed_asset_id.'<br>';
		//echo 'asset_bean_number = '.$asset_bean->fixed_asset.'<br>';
		if (!empty ($asset_bean->fixed_asset_id)) {
			$fix_asset_bean = BeanFactory :: getBean('HFA_Fixed_Assets')->retrieve_by_string_fields(array (
				'id' => $asset_bean->fixed_asset_id
			));
			
			//$asset_number = $fix_asset_bean->asset_num;
			$book_code= $fix_asset_bean->book_name;
			$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
										    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_fa_transfer_pkg/">
										        <ns1:SOAHeader>
										            <ns1:Responsibility>CUX_SUPER_RESPKEY</ns1:Responsibility>
										            <ns1:RespApplication>CUX</ns1:RespApplication>
										            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
										            <ns1:NLSLanguage>AMERICAN</ns1:NLSLanguage>
										            <ns1:Org_Id>81</ns1:Org_Id>
										        </ns1:SOAHeader>
										    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>sysadmin</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">welcome8</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
										    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_fa_transfer_pkg/do_transfer/">
										        <ns2:InputParameters>
										            <ns2:P_TRANSFER_DATA>
										                <ns2:P_TRANSFER_DATA_ITEM><ns2:LINE_ID>1</ns2:LINE_ID>
										                    <ns2:ASSET_NUM>' . $fix_asset_bean->name . '</ns2:ASSET_NUM>
										                    <ns2:BOOK_CODE>'.$book_code.'</ns2:BOOK_CODE>
										                    <ns2:OUT_QTY>1</ns2:OUT_QTY>
										                    <ns2:IN_QTY>1</ns2:IN_QTY>
										                    <ns2:ACCOUNT_ID_IN>' . $cost_cetner . '</ns2:ACCOUNT_ID_IN>
										                    <ns2:SITE_IN>'.$location.'</ns2:SITE_IN>
										                    <ns2:SOURCE_NUM/>
										                    <ns2:ATTRIBUTE_CATEGORY/>
										                    <ns2:ATTRIBUTE1>'.$production.'</ns2:ATTRIBUTE1>
										                    <ns2:ATTRIBUTE2/>
										                    <ns2:ATTRIBUTE3/>
										                    <ns2:ATTRIBUTE4/>
										                    <ns2:ATTRIBUTE5/>
										                    <ns2:ATTRIBUTE6/>
										                    <ns2:ATTRIBUTE7/>
										                    <ns2:ATTRIBUTE8/>
										                    <ns2:ATTRIBUTE9/>
										                    <ns2:ATTRIBUTE10/>
										                    <ns2:ATTRIBUTE11/>
										                    <ns2:ATTRIBUTE12/>
										                    <ns2:ATTRIBUTE13/>
										                    <ns2:ATTRIBUTE14/>
										                    <ns2:ATTRIBUTE15/>
										                </ns2:P_TRANSFER_DATA_ITEM>
										            </ns2:P_TRANSFER_DATA>
										        </ns2:InputParameters>
										    </soap:Body>
										</soap:Envelope>';
		}
		//echo "postAllString=" . $postAllString . "<br>";
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
			//echo 'Curl error: ' . curl_error($soap_do);
			$result_array[0]='E';
			$result_array[1]='Curl error: ' . curl_error($soap_do);
		}
		
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
		$x_asset_out_data = $xml->getElementsByTagName("X_TRANSFER_OUT_DATA");
		//输出
		//echo 'result = '.var_dump($result);
		//echo "x_return_status = " . $x_return_status->item(0)->nodeValue . "<br>";
		//echo "x_msg_data = " . $x_msg_data->item(0)->nodeValue . "<br>";
		//echo "x_asset_out_data = " . $x_asset_out_data->item(0)->nodeValue . "<br>";
		
		
		$result_array[0]=$x_return_status->item(0)->nodeValue;
		$result_array[1]="Product Segment=".$production."~".$x_msg_data->item(0)->nodeValue;
		return $result_array;
		//$xml_array = new SimpleXMLElement($x_asset_out_data->item(0)->nodeValue);
		/*foreach ($xml_array as $tmp) {
			echo 'RESOURCE_TYPE =' . $tmp->RESOURCE_TYPE . "<br>";
			echo 'RESOURCE_NUM =' . $tmp->RESOURCE_NUM . "<br>";
			echo 'RETURN_STATUS =' . $tmp->RETURN_STATUS . "<br>";
			echo 'ERROR_MESSAGE =' . $tmp->ERROR_MESSAGE . "<br>";
			//成功后怎么办
		}*/
	}
}
?>
