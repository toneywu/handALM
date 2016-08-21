<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_MetersViewEdit extends ViewEdit
{

    function Display() {

        global $current_user;
        global $db;
/*        echo "string";
        foreach ($current_user as $key => $value) {
            echo '</br>'.$key ." = ".$value;
        }*/

       if ((isset($this->bean->hat_asset_locationss_id)==false || $this->bean->hat_asset_locationss_id=="") && (isset($_REQUEST['location_id']) && $_REQUEST['location_id']!="")&& (isset($_REQUEST['hat_assets_id'])==false || $_REQUEST['hat_assets_id']!="")) { 
            //如果没有地点记录，并且传入了地点参数，并且没有资产参数时，从地点进行读取
            //如果有资产参数也同样跳过本段，从后续的资产数据中带出地点
             $sel_current_location ="SELECT 
                                        hat_asset_locations.id location_id,
                                        hat_asset_locations.name location_name,
                                        hat_asset_locations.location_title location_title,
                                        ham_maint_sites.id site_id,
                                        ham_maint_sites.name site_name
                                    FROM
                                        hat_asset_locations,
                                        ham_maint_sites
                                    WHERE
                                        ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
                                            AND ham_maint_sites.deleted = 0
                                            AND hat_asset_locations.deleted = 0
                                            and hat_asset_locations.id ='".$_REQUEST['location_id']."'";

            //echo($sel_current_asset);
            $resule_locations =  $db->query($sel_current_location);

            while ( $resule_asset = $db->fetchByAssoc($resule_locations) ) {
                $this->bean->hat_asset_location_id = $resule_asset['location_id'];
                $this->bean->location = $resule_asset['location_name'];
                $this->bean->location_title = $resule_asset['location_title'];
                //$this->bean->site = $resule_asset['site_name'];
                //$this->bean->ham_maint_sites_id = $resule_asset['site_id'];
           }
       } else if (isset($this->bean->hat_asset_location_id) && $this->bean->hat_asset_location_id!="") {
            //否则查询数据库，读取地点说明
             $sel_current_location ="SELECT 
                                        hat_asset_locations.location_title location_title
                                    FROM
                                        hat_asset_locations
                                    WHERE
                                        hat_asset_locations.id ='".$this->bean->hat_asset_location_id."'";
            //echo($sel_current_asset);
            $resule_locations =  $db->query($sel_current_location);

            while ( $resule_asset = $db->fetchByAssoc($resule_locations) ) {
                $this->bean->location_title = $resule_asset['location_title'];
            }
       }

       if ((isset($this->bean->hat_assets_id)==false || $this->bean->hat_assets_id=="") && (isset($_REQUEST['hat_assets_id']) && $_REQUEST['hat_assets_id']!="")) { //如果当前记录中没有资产，并且有资产传传入，则加载资产
             $sel_current_asset ="SELECT
                                        hat_assets.id asset_id,
                                        hat_assets.name asset_name,
                                        hat_assets.asset_desc,
                                        hat_asset_locations.id location_id,
                                        hat_asset_locations.name location_name,
                                        hat_asset_locations.location_title location_title,
                                        hat_assets.location_desc,
                                        ham_maint_sites.id site_id,
                                        ham_maint_sites.name site_name,
                                        hat_assets.haa_frameworks_id domain_id,
                                        haa_frameworks.name domain_name
                                    FROM
                                        haa_frameworks,
                                        hat_assets
                                            LEFT JOIN
                                        (hat_asset_locations, hat_asset_locations_hat_assets_c, ham_maint_sites) ON (hat_assets.id = hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_assets_idb
                                            AND hat_asset_locations_hat_assets_c.hat_asset_locations_hat_assetshat_asset_locations_ida = hat_asset_locations.id
                                            AND ham_maint_sites.id = hat_asset_locations.ham_maint_sites_id
                                            AND hat_asset_locations_hat_assets_c.deleted = 0
                                            AND ham_maint_sites.deleted = 0
                                            AND hat_asset_locations.deleted = 0)
                                    WHERE
                                        hat_assets.deleted = 0
                                        AND haa_frameworks.deleted = 0 
                                        AND haa_frameworks.id = hat_assets.haa_frameworks_id
                    and hat_assets.id = '".$_REQUEST['hat_assets_id']."'";

            //echo($sel_current_asset);
            $resule_assets =  $db->query($sel_current_asset);

            while ( $resule_asset = $db->fetchByAssoc($resule_assets) ) {
                $this->bean->hat_assets_id = $resule_asset['asset_id'];
                $this->bean->asset = $resule_asset['asset_name'];
                $this->bean->asset_desc = $resule_asset['asset_desc'];
                $this->bean->hat_asset_location_id = $resule_asset['location_id'];
                $this->bean->hat_asset_location = $resule_asset['location_name'];
                $this->bean->location_title = $resule_asset['location_title'];
                //$this->bean->location_desc = $resule_asset['location_desc'];
                $this->bean->haa_frameworks_id = $resule_asset['domain_id'];
                $this->bean->domain = $resule_asset['domain_name'];
                //$this->bean->site = $resule_asset['site_name'];
                //$this->bean->ham_maint_sites_id = $resule_asset['site_id'];
               // $this->bean->location_map_enabled = $resule_asset['location_map_enabled'];
           }
       } else  if (isset($this->bean->hat_assets_id) && $this->bean->hat_assets_id!="") {
             $sel_current_asset ="SELECT
                                        hat_assets.asset_desc
                                    FROM
                                        hat_assets
                                    WHERE
                                        hat_assets.deleted = 0
                    and hat_assets.id = '".$this->bean->hat_assets_id."'";

            $resule_assets =  $db->query($sel_current_asset);

            while ( $resule_asset = $db->fetchByAssoc($resule_assets) ) {
                $this->bean->asset_desc = $resule_asset['asset_desc'];
           }
       }


        if(empty($this->bean->id)){ //如果当前为新记录，则初始化字段
           //$this->bean->description = $this->bean->id;
           $this->bean->reading_date = date('Y-m-d H:i');
        }

/*        if (isset($this->bean->asset_desc)) {
            echo '<script>var js_var_asset_desc="'. $this->bean->asset_desc.'";</script>';
        }
        if (isset($this->bean->location_title)) {
            echo '<script>var js_var_location_title="'. $this->bean->location_title.'";</script>';
        }
*/

        parent::Display();
    }
}
