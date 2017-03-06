<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/MVC/View/SugarView.php');
require_once('include/gantt/ProjectPlanner.php');
class ProjectViewDetail extends SugarView{

	function __construct()
	{
		parent::__construct();
	}

	function display(){
		$ajaxUrl='index.php?module=Project&action=DetailView&to_pdf=true';
		$prjPlanner=new ProjectPlanner();
		$prjPlanner->loadGantt($_GET,$_POST,$ajaxUrl);
	}

	function _displaySubPanels(){
		return true;
	}
}
?>