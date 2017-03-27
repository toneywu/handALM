<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAA_Period_SetsViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
  function processSearchForm(){
    parent::processSearchForm();
    $haa_frameworks_id=$_SESSION["current_framework"];
    if ($this->where) { 
     $this->where.=" AND haa_period_sets.haa_frameworks_id_c ='".$haa_frameworks_id."'";
    }else{
     $this->where.=" haa_period_sets.haa_frameworks_id_c ='".$haa_frameworks_id."'";
   }

   //var_dump($_SESSION['HAA_Period_Sets2_QUERY']);
 } 

 function display()
{
	
	parent::display();
  
}
}