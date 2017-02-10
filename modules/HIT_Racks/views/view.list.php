<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HIT_RacksViewList extends ViewList
{
  function Display() {

    parent::Display();
    /*echo $this->where;
    global $db;
    var_dump($db->lastsql);*/
  }
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
  parent::processSearchForm();
  //echo $this->where;
  //var_dump($_REQUEST);
  if ($_REQUEST['searchFormTab'] == 'advanced_search') {
    if ($this->where) {
      $this->where =" hit_racks.deleted=0 AND hit_racks.name LIKE '".$_REQUEST['name_advanced']."%'";
      if ($_REQUEST['asset_status_advanced'][0]!='') {
        $this->where.=" AND EXISTS ( SELECT *  FROM hat_assets WHERE asset_status IN ('".$_REQUEST['asset_status_advanced'][0]."') AND hit_racks.`hat_assets_id` = hat_assets.id)";
      }
      if ($_REQUEST['assigned_user_id_advanced'][0]!='') {
        $this->where.=" AND EXISTS ( SELECT *  FROM users WHERE users.id = '".$_REQUEST['assigned_user_id_advanced'][0]."' AND hit_racks.assigned_user_id = users.id)";
      }
      //不能把排序加到where里
      //$this->where.=" ORDER BY ".$_REQUEST['orderBy']." ".$_REQUEST['sortOrder']." ";
    }
  }
  else{
    if ($this->where) {
      $this->where =" hit_racks.deleted=0 AND hit_racks.name LIKE '".$_REQUEST['name_basic']."%'";
      if ($_REQUEST['asset_status_basic'][0]!='') {
        $this->where.=" AND EXISTS ( SELECT *  FROM hat_assets WHERE asset_status IN ('".$_REQUEST['asset_status_basic'][0]."') AND hit_racks.`hat_assets_id` = hat_assets.id)";
      }
    }
  }
  
}


}


