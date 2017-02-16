<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAA_Integration_Interface_HeadersViewList extends ViewList
{
	function processSearchForm()
	{
		parent::processSearchForm();
		$haa_frameworks_id=$_SESSION["current_framework"];
		if ($this->where) { 
			$this->where.=" AND haa_integration_interface_headers.haa_frameworks_id_c='".$haa_frameworks_id."'";
		}else{
			$this->where.=" haa_integration_interface_headers.haa_frameworks_id_c='".$haa_frameworks_id."'";
		}
	}

}