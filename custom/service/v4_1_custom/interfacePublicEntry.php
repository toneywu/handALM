<?php
if (!defined('sugarEntry'))
	define('sugarEntry', true);
require_once ('service/v4_1/SugarWebServiceImplv4_1.php');
class interfacePublicEntry extends SugarWebServiceImplv4_1 {
	/*
	 * Returns the session id if authenticated
	 *
	 * @param string $session
	 * @return string $session - false if invalid.
	 *
	 */

	function interfaceEntry($session, $interface_code,$ifc_header_list, $ifc_line_lists) {
		global $beanList, $beanFiles, $current_user,$timedate;
		$return_list=array(
			'return_status' => '0',
			'msg_data' => '',
			'rtn_key'=>'',
			'rtn_attr1'=>'',
			'rtn_attr2'=>'',
			'rtn_attr3'=>'',
			'rtn_attr4'=>'',
			'rtn_attr5'=>'',
			'rtn_attr6'=>'',
			'rtn_attr7'=>'',
			'rtn_attr8'=>'');

		$GLOBALS['log']->info('Begin: interfacePublicEntry->interfaceEntry');
		$error = new SoapError();

		//authenticate
		if (!self :: $helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error)) {
			$GLOBALS['log']->info('End: interfacePublicEntry->interfaceEntry.');
			return false;
		}

		$ifcBean=BeanFactory::getBean('HAA_Interfaces')->retrieve_by_string_fields(
			array(
				'interface_code'=>$interface_code,
				)
			);
		if(!$ifcBean){
			$return_list['return_status']='1';
			$return_list['msg_data']='传入的接口代码无效：'.$interface_code;
			return $return_list;
		}

		if(is_array($ifc_header_list)){
			$beanHeader=BeanFactory::newBean('HAA_Integration_Interface_Headers');

			$beanHeader->haa_frameworks_id_c=$ifcBean->haa_frameworks_id_c;
			$beanHeader->haa_interfaces_id_c=$ifcBean->id;
			$beanHeader->interface_code=$interface_code;
			$beanHeader->ext_batch_number=$ifc_header_list['ext_batch_number'];
			$beanHeader->received_date=$timedate->nowDb();
			$beanHeader->line_cnt=$ifc_header_list['line_cnt'];
			$beanHeader->process_status='N';
			$beanHeader->reference1=$ifc_header_list['reference1'];
			$beanHeader->reference2=$ifc_header_list['reference2'];
			$beanHeader->reference1=$ifc_header_list['reference3'];
			$beanHeader->reference2=$ifc_header_list['reference4'];

			$beanHeader->save();

			foreach($ifc_line_lists as $ifc_line_list){
				$beanLine=BeanFactory::newBean('HAA_Integration_Interface_Lines');

				$beanLine->haa_integration_interface_headers_id_c=$beanHeader->id;
				$beanLine->ext_line_id=$ifc_line_list['ext_line_id'];
				$beanLine->line_status='N';
				$beanLine->segment1=$ifc_line_list['segment1'];
				$beanLine->segment2=$ifc_line_list['segment2'];
				$beanLine->segment3=$ifc_line_list['segment3'];
				$beanLine->segment4=$ifc_line_list['segment4'];
				$beanLine->segment5=$ifc_line_list['segment5'];
				$beanLine->segment6=$ifc_line_list['segment6'];
				$beanLine->segment7=$ifc_line_list['segment7'];
				$beanLine->segment8=$ifc_line_list['segment8'];
				$beanLine->segment9=$ifc_line_list['segment9'];
				$beanLine->segment10=$ifc_line_list['segment10'];
				$beanLine->segment11=$ifc_line_list['segment11'];
				$beanLine->segment12=$ifc_line_list['segment12'];
				$beanLine->segment13=$ifc_line_list['segment13'];
				$beanLine->segment14=$ifc_line_list['segment14'];
				$beanLine->segment15=$ifc_line_list['segment15'];
				$beanLine->segment16=$ifc_line_list['segment16'];
				$beanLine->segment17=$ifc_line_list['segment17'];
				$beanLine->segment18=$ifc_line_list['segment18'];
				$beanLine->segment19=$ifc_line_list['segment19'];
				$beanLine->segment20=$ifc_line_list['segment20'];

				$beanLine->value1=$ifc_line_list['value1'];
				$beanLine->value2=$ifc_line_list['value2'];
				$beanLine->value3=$ifc_line_list['value3'];
				$beanLine->value4=$ifc_line_list['value4'];
				$beanLine->value5=$ifc_line_list['value5'];
				$beanLine->value6=$ifc_line_list['value6'];
				$beanLine->value7=$ifc_line_list['value7'];
				$beanLine->value8=$ifc_line_list['value8'];
				$beanLine->value9=$ifc_line_list['value9'];
				$beanLine->value10=$ifc_line_list['value10'];
				$beanLine->value11=$ifc_line_list['value11'];
				$beanLine->value12=$ifc_line_list['value12'];
				$beanLine->value13=$ifc_line_list['value13'];
				$beanLine->value14=$ifc_line_list['value14'];
				$beanLine->value15=$ifc_line_list['value15'];
				$beanLine->value16=$ifc_line_list['value16'];
				$beanLine->value17=$ifc_line_list['value17'];
				$beanLine->value18=$ifc_line_list['value18'];
				$beanLine->value19=$ifc_line_list['value19'];
				$beanLine->value20=$ifc_line_list['value20'];

				$beanLine->save();
			}

			require_once('modules/HAA_Interfaces/haaInterfaceBase.php');
			$frwBean=BeanFactory::getBean('HAA_Frameworks',$ifcBean->haa_frameworks_id_c);
			if($frwBean){
				$_SESSION["current_framework_code"]=$frwBean->code;
			}

			$paramsArray[0]=$ifcBean->id;
			$paramsArray[1]=$beanHeader->id;
			$interfaceBaseClass= new haaInterfaceBase();

			$interfaceBaseClass->execute_Interface_Processor($paramsArray);
			$return=$interfaceBaseClass->interfaceProcessReturn;

			if($return["return_status"]!='0'){
				$return_list['return_status']='1';
				$return_list['msg_data']=$return['msg_data'];
			}
			else{
				$return_list['rtn_key']=$beanHeader->id;
			}
			
		}
		return $return_list;
	}
}
?>