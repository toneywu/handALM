<?php
/**
 *by Toney Wu @handALM
 */

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//require_once("modules/AOW_WorkFlow/aow_utils.php");

class HAT_AssetsController extends SugarController {

    public function action_save() {

        if(!$this->bean->use_location_gis ){
             $this->bean->asset_map_type = $this->bean->map_type;
             $this->bean->asset_map_lat = $this->bean->map_lat;
             $this->bean->asset_map_lng = $this->bean->map_lng;
             $this->bean->asset_map_zoom = $this->bean->map_zoom;
             $this->bean->asset_map_marker_type = $this->bean->map_marker_type;
             $this->bean->asset_map_marker_data = $this->bean->map_marker_data;
             $this->bean->asset_map_layer_id = $this->bean->map_layer_id;
        }
        parent::action_save();
    }

}
