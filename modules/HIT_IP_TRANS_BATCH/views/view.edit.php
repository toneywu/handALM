<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.edit.php');

class HIT_IP_TRANS_BATCHViewEdit extends ViewEdit {

	function Display() {

		global $current_user;
		global $db;
		

		parent :: Display();
	}

}