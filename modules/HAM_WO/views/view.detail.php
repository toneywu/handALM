<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAM_WOViewDetail extends ViewDetail {

	function Display() {

		global $app_list_strings;

		if (isset($this->bean->wo_status))
			//$this->bean->wo_status = "<span class='color_tag color_doc_status_{$this->wo_status}'>" . $app_list_strings['ham_wo_status_list'][$this->wo_status] . "</span>";
		    $this->ss->assign('WO_STATUS_TAGED',"<span class='color_tag color_doc_status_{$this->bean->wo_status}'>" . $app_list_strings['ham_wo_status_list'][$this->bean->wo_status] . "</span>");
			parent :: Display();

	}

}