<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class AOS_ContractsViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
  function processSearchForm(){
    parent::processSearchForm();
    $haa_frameworks_id=$_SESSION["current_framework"];
    if ($this->where) { 
      $this->where.=" AND aos_contracts_cstm.haa_frameworks_id_c ='".$haa_frameworks_id."'";
    }else{
     $this->where.=" where aos_contracts_cstm.haa_frameworks_id_c ='".$haa_frameworks_id."'";
   }
 } 
}