<?php

/**
 *by Toney Wu @handALM
 */

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
//require_once("modules/AOW_WorkFlow/aow_utils.php");
require_once ("modules/HAT_Assets/PushAssetsUtil.php");
class HAT_AssetsController extends SugarController {

	public function action_save() {

		if (!$this->bean->use_location_gis) {
			$this->bean->asset_map_type = $this->bean->map_type;
			$this->bean->asset_map_lat = $this->bean->map_lat;
			$this->bean->asset_map_lng = $this->bean->map_lng;
			$this->bean->asset_map_zoom = $this->bean->map_zoom;
			$this->bean->asset_map_marker_type = $this->bean->map_marker_type;
			$this->bean->asset_map_marker_data = $this->bean->map_marker_data;
			$this->bean->asset_map_layer_id = $this->bean->map_layer_id;
		} else {
			$this->bean->asset_map_type = "NONE";
			$this->bean->asset_map_lat = "";
			$this->bean->asset_map_lng = "";
			$this->bean->asset_map_zoom = "";
			$this->bean->asset_map_marker_type = "";
			$this->bean->asset_map_marker_data = "";
			$this->bean->asset_map_layer_id = "";
		}
		parent :: action_save();
		$queryParams = array(
							'module' => 'HAT_Assets',
							'action' => 'DetailView',
							'record' => $this->bean->id,
							);
		SugarApplication::redirect('index.php?' . http_build_query($queryParams));
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