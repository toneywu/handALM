<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_Counting_RulesViewList extends ViewList
{
	function processSearchForm()
	{
		parent::processSearchForm();
		$haa_frameworks_id=$_SESSION["current_framework"];
		if ($this->where) { 
			$this->where.=" AND hat_counting_rules.haa_frameworks_id_c='".$haa_frameworks_id."'";
		}else{
			$this->where.=" hat_counting_rules.haa_frameworks_id_c='".$haa_frameworks_id."'";
		}
	}

	/*function display()
	{
		parent::display();
		global $db;
		var_dump($db->lastsql);
	}*/
}