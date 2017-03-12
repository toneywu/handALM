<?php


/*
 * Created on 2016-9-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class UpdateAsset {

	function update_fix_asset($parameters_array) {
		$username = "XR_API";
		$password = "asdf1234";
		//$url = "http://111.200.33.205:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
		/*$url = "http://111.200.33.204:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";*/
		$url = "http://111.200.33.204:1574/XR_8034/webservices/SOAProvider/plsql/cux_ws_fa_transfer_pkg/";
	
		$assets_line_array = $parameters_array['line_asset_infos'];
		$line_cnt = $parameters_array['line_cnt'];
		$postAllString = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
										    <soap:Header xmlns:ns1="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_fa_transfer_pkg/">
										        <ns1:SOAHeader>
										            <ns1:Responsibility>CUX_SUPER_RESPKEY</ns1:Responsibility>
										            <ns1:RespApplication>CUX</ns1:RespApplication>
										            <ns1:SecurityGroup>STANDARD</ns1:SecurityGroup>
										            <ns1:NLSLanguage>AMERICAN</ns1:NLSLanguage>
										            <ns1:Org_Id>81</ns1:Org_Id>
										        </ns1:SOAHeader>
										    <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:env="http://schemas.xmlsoap.org/soap/envelope/" soap:mustUnderstand="1"><wsse:UsernameToken xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd"><wsse:Username>XR_API</wsse:Username><wsse:Password Type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">asdf1234</wsse:Password></wsse:UsernameToken></wsse:Security></soap:Header>
										    <soap:Body xmlns:ns2="http://xmlns.oracle.com/apps/cux/soaprovider/plsql/cux_ws_fa_transfer_pkg/do_transfer/">
										        <ns2:InputParameters>
										            <ns2:P_TRANSFER_DATA>';
													
		$loopInput = "";
		
		for($i=0;$i<$line_cnt;$i++){
				$line_target_cost_center = $assets_line_array["line_target_cost_center".$i];
				$line_target_cost_center_id = $assets_line_array["line_target_cost_center_id".$i];
				$line_target_location = $assets_line_array["line_target_location".$i];
				$line_target_location_id = $assets_line_array["line_target_location_id".$i];
				$line_target_asset_attribute10 = $assets_line_array["line_target_asset_attribute10".$i];
				$line_target_location_desc = $assets_line_array["line_target_location_desc".$i];
				
				$bean_location = BeanFactory :: getBean('HAT_Asset_Locations', $line_target_location_id);
				$mait_sites_bean = BeanFactory :: getBean('HAM_Maint_Sites', $bean_location->ham_maint_sites_id);
				
				$asset_id = $assets_line_array["line_asset_id".$i];
				
				$asset_bean = BeanFactory :: getBean('HAT_Assets')->retrieve_by_string_fields(array (
													'id' => $asset_id
												));
				$fix_asset_bean = BeanFactory :: getBean('HFA_Fixed_Assets')->retrieve_by_string_fields(array (
													'id' => $asset_bean->fixed_asset_id
												));
				$asset_source_bean = BeanFactory :: getBean('HAT_Asset_Sources')->retrieve_by_string_fields(array (
													'id' => $asset_bean->asset_source_id
												));
				$flag = strpos($asset_source_bean->name, ':');
				$line_source_num ="";
	            if($flag !== FALSE){
	                $arr = explode(':', $asset_source_bean->name);
	                $line_source_num = $arr[0];
	            }else{
	                $line_source_num = $asset_source_bean->name;
	            }
	            //$line_source_num = $asset_source_bean->name;
				$book_code= $fix_asset_bean->book_name;
				
			if(!empty($fix_asset_bean)&&$asset_bean->enable_fa==1){
				$loopInput = $loopInput .'<ns2:P_TRANSFER_DATA_ITEM>';
				$loopInput = $loopInput .'<ns2:LINE_ID>1</ns2:LINE_ID>';
				$loopInput = $loopInput .'<ns2:ASSET_NUM>'.$fix_asset_bean->name.'</ns2:ASSET_NUM>';
				$loopInput = $loopInput .'<ns2:BOOK_CODE>'.$book_code.'</ns2:BOOK_CODE>';
				$loopInput = $loopInput .'<ns2:OUT_QTY>1</ns2:OUT_QTY>';		
				$loopInput = $loopInput .'<ns2:IN_QTY>1</ns2:IN_QTY>';
				$loopInput = $loopInput .'<ns2:ACCOUNT_ID_IN>'.$line_target_cost_center.'</ns2:ACCOUNT_ID_IN>';
				$loopInput = $loopInput .'<ns2:SITE_IN>'.$mait_sites_bean->name.'</ns2:SITE_IN>';
				$loopInput = $loopInput .'<ns2:SOURCE_NUM>'.$line_source_num.'</ns2:SOURCE_NUM>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE_CATEGORY/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE1>'.$line_target_asset_attribute10.'</ns2:ATTRIBUTE1>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE2/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE3/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE4/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE5/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE6/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE7/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE8/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE9/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE10/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE11/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE12/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE13/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE14/>';
				$loopInput = $loopInput .'<ns2:ATTRIBUTE15/>';		
				$loopInput = $loopInput.'</ns2:P_TRANSFER_DATA_ITEM>';		
			}
		}
		
		$loopInput = $loopInput . "</ns2:P_TRANSFER_DATA></ns2:InputParameters></soap:Body></soap:Envelope>";
		$postAllString = $postAllString . '' . "$loopInput";
		$result_array =array();
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
		$result_array[1]=$postAllString."Product Segment=".$production."~".$x_msg_data->item(0)->nodeValue;
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
