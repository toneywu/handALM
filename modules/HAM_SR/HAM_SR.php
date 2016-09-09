<?php

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HAM_SR/HAM_SR_sugar.php');
class HAM_SR extends HAM_SR_sugar {

	function get_list_view_data(){
	//refer to the task module as an example
	//or refer to the asset module as the first customzation module with this feature
		global $action, $currentModule, $focus, $current_module_strings, $app_list_strings, $timedate;

		$SR_fields = $this->get_list_view_array();

		if (!empty($this->sr_status))
			$SR_fields['SR_STATUS'] = "<span class='color_tag color_doc_status_{$this->sr_status}'>".$app_list_strings['ham_sr_status_list'][$this->sr_status]."</span>";

		return $SR_fields;
	}


	function save($check_notify = false) {
		if ($this->sr_status == 'SUBMITTED') {
			$this->sr_status = 'APPROVED';
		}
		if ($this->sr_status == 'COMPLETE') {
			$this->sr_status = 'CLOSED'; //如果提交时状态为完成，保存后状态为结束。结束状态下没有任何内容可再修改。
		}
		parent :: save($check_notify); //保存WO主体
	}

	function __construct(){
		parent::__construct();
	}

}
?>