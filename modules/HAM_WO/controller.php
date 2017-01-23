<?php

/**
 *by Toney Wu @handALM
 */

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
class HAM_WOController extends SugarController {

	public function action_MassUpdate() {
		$action=$_POST["action"];
		$delete_flag=$_POST["delete"];
		$occur_error=0;
		//echo var_dump($_POST);
		if($action=="MassUpdate"&&$delete_flag==true){
			
			$recordIds = explode(',', $_REQUEST['uid']);
			foreach ($recordIds as $recordId) {
				$wo_bwan = BeanFactory::getBean("HAM_WO",$recordId);
				
				
				if($occur_error==0){
					if($wo_bwan->wo_status!="DRAFT"&&$wo_bwan->wo_status!="RETURNED"){
						$occur_error=1;
					}
				}
			}
			if($occur_error==1){
				$queryParams = array(
								'module' => 'HAM_WO',
								'action' => 'index',
								'error_message' => "勾选工单中存在状态不等于拟定或退回的不可删除",
								);
				SugarApplication::redirect('index.php?' . http_build_query($queryParams));
			}
		}
		parent :: action_MassUpdate();
		if($occur_error==0){
				$queryParams = array(
								'module' => 'HAM_WO',
								'action' => 'index',
								'error_message' => "",
								);
				SugarApplication::redirect('index.php?' . http_build_query($queryParams));
			}
	}

	public function action_displaypassedids() {
		if (!empty ($_REQUEST['uid'])) {
			$recordIds = explode(',', $_REQUEST['uid']);
			/*foreach ($recordIds as $recordId) {
				$bean = SugarModule :: get($_REQUEST['module'])->loadBean();
				$bean->retrieve($recordId);
				echo "Sent Record ID {$bean->id}</br>";
			}*/
			$assetUtil = new PushAssetsUtil();
			$postAllString = $assetUtil->gernerat_xml_str($recordIds, 'sysadmin', 'welcome8', '2015-05-06', '2016-07-26');
			$url = "http://111.200.33.205:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
			$error_message=$assetUtil->call_ws($postAllString, $url);
			$queryParams = array(
							'module' => 'HAT_Assets',
							'action' => 'index',
							'error_message' => $error_message,
							);
			SugarApplication::redirect('index.php?' . http_build_query($queryParams));

		}
	}

	public function action_testss() {
		$records = array (
			'27420e70-710a-67a8-5a5f-56c7e6ff056b',
			'44516258-197e-0c85-e2c0-5726ad244587'
		);
		$assetUtil = new PushAssetsUtil();
		$postAllString = $assetUtil->gernerat_xml_str($records, 'sysadmin', 'welcome8', '2015-05-06', '2016-07-26');
		//header("Content-type: text/xml");
		$url = "http://111.200.33.205:1574/8020/webservices/SOAProvider/plsql/cux_ws_eam_basic_info_pkg/";
		$assetUtil->call_ws($postAllString, $url);
	}

}