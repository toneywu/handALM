<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.list.php');

class HAM_WOOPViewList extends ViewList {

	function Display() {
		
		echo '<script src="modules/HAM_WOOP/js/HAM_WOOP_listview.js"></script>';
		

		parent :: Display();
	}

}