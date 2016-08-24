<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAM_WOOPViewDetail extends ViewDetail {

	function Display() {
		//下一道工序的获取
		if (isset ($_REQUEST['record']) && $_REQUEST['record'] != "") {
			$bean_woop = BeanFactory :: getBean('HAM_WOOP', $_REQUEST['record']);
			$wo_id = $bean_woop->ham_wo_id;

			$next_beans = $bean_woop->get_full_list("woop_number", "ham_woop.ham_wo_id='" . $wo_id . "' AND ham_woop.woop_number>" . $this->bean->woop_number);
			if (count($next_beans)==0) {
				//为空 是最后一个工序
				$last_woop_flag="Y";
			} else {
				//为空 不是最后一个工序 那么 下一个工序是 数组下标为0
				$next_bean = $next_beans[0];
				$this->bean->next_woop = $next_bean->woop_number;
				$this->bean->next_woop_name = $next_bean->name;
				$this->bean->next_work_center = $next_bean->work_center;
				$this->bean->next_work_center_res = $next_bean->work_center_res;
				$this->bean->next_work_center_people = $next_bean->work_center_people;
			}
		}
		parent :: Display(); 

	}

	

}
?>