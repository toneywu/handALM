<?php

/**
 *by Toney Wu @handALM
 */

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
//require_once("modules/AOW_WorkFlow/aow_utils.php");

class HAT_Asset_LocationsController extends SugarController {

	public function action_setFF() {
	}

	public function action_save() {
		
		parent :: action_save();
		$queryParams = array(
							'module' => 'HAT_Asset_Locations',
							'action' => 'DetailView',
							'record' => $this->bean->id,
							);
		SugarApplication::redirect('index.php?' . http_build_query($queryParams));
	}	

}