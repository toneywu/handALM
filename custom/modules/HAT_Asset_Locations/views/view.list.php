<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_Asset_LocationsViewList extends ViewList
{
    function Display() {
        global $app_list_strings;
        $this->ss->assign('APP_LIST', $app_list_strings);
        parent::Display();
    }

    function processSearchForm(){
      parent::processSearchForm();
      $haa_frameworks_id=$_SESSION["current_framework"];
      if ($this->where) { 
        $this->where.=" AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id=hat_asset_locations.ham_maint_sites_id AND hms.haa_frameworks_id='".$haa_frameworks_id."')";
      }else{
        $this->where=" EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id=hat_asset_locations.ham_maint_sites_id AND hms.haa_frameworks_id='".$haa_frameworks_id."')";
      }
    }
}
