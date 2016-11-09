<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_EventManegerViewList extends ViewList
{
	function processSearchForm()
	{
		parent::processSearchForm();
		$haa_frameworks_id=$_SESSION["current_framework"];
        if ($this->where) {//多个查询条件时加and以及拼接查询条件
        	$this->where.=" AND EXISTS ( SELECT 1 FROM hat_eventmaneger tc WHERE hat_eventmaneger.id=tc.id AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
        }else{//没有其他查询条件时
        	$this->where=" EXISTS ( SELECT 1 FROM hat_eventmaneger tc WHERE hat_eventmaneger.id=tc.id AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
        }
    }
} 
?>