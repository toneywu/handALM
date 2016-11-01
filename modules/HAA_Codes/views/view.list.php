<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAA_CodesViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
  parent::processSearchForm();

  $haa_frameworks_id=$_SESSION["current_framework"];
  if ($this->where) {
    $this->where.=" and haa_codes.haa_frameworks_id='".$haa_frameworks_id."'";
  }else{
    $this->where="haa_codes.haa_frameworks_id='".$haa_frameworks_id."'";
  }
}

}
