<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HIT_IPViewList extends ViewList
{
  function Display() {

    parent::Display();
    /*echo $this->where;
    global $db;
    var_dump($db->lastsql);*/
  }
  function processSearchForm(){

    parent::processSearchForm();
    
    $haa_frameworks_id=$_SESSION["current_framework"];
    if ($_REQUEST['searchFormTab'] == 'advanced_search') {
       //
    }
    else{
      $this->where = " hit_ip.deleted=0 ";
      if ($_REQUEST['name_basic']!='') {
        $this->where.=" AND (hit_ip.name like '%".$_REQUEST['name_basic']."%'"
                    ." OR EXISTS (SELECT 1 FROM
                        hit_ip_subnets hiss 
                        WHERE hiss.parent_hit_ip_id = hit_ip.id
                        AND hiss.name like '".$_REQUEST['name_basic']."%'))";
      }
      if ($_REQUEST['site_basic']!='') {
        $this->where.=" AND (jt0.name like '".$_REQUEST['site_basic']."%'"
                    ." OR EXISTS (SELECT 1 FROM
                        hit_ip_subnets his LEFT JOIN ham_maint_sites hms on his.hat_asset_locations_id = hms.id
                        WHERE his.parent_hit_ip_id = hit_ip.id
                        AND hms.name like '".$_REQUEST['site_basic']."%'))";
      }
    }
    //var_dump($db->lastsql);
    /*if ($this->where) { 
      $this->where.=" AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = ham_wo.ham_maint_sites_id AND hms.haa_frameworks_id ='".$haa_frameworks_id."')";
    }else{
      $this->where=" EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = ham_wo.ham_maint_sites_id AND hms.haa_frameworks_id ='".$haa_frameworks_id."')";
    }
    //echo $this->where;
    //增加HPR权限控制逻辑
    require_once('modules/HPR_Group_Priviliges/checkListACL.php');
    global $current_user;
    $current_module = $this->module;
    $current_user_id =$current_user->id;
    $paraArray=array();
    $paraArray[]=$current_user_id;
    $aclSQLList=getListViewSQLStatement($current_module,$current_user_id,$haa_frameworks_id,$paraArray);
    $this->where.=empty($this->where)?(empty($aclSQLList)?"":$aclSQLList):(empty($aclSQLList)?"":'  AND '.$aclSQLList);*/
   //var_dump($this->where);
    //End HPR权限控制逻辑
  }
}
