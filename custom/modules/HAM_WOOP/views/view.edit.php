<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.edit.php');

class HAM_WOOPViewEdit extends ViewEdit {

	function Display() {

		global $current_user;
		global $db;

		//		foreach ($_REQUEST as $key => $value) {
		//		    echo '</br>'.$key ." = ".$value;
		//		}
		if (isset ($_REQUEST['ham_wo_id']) && $_REQUEST['ham_wo_id'] != "") {
			//$bean_woop = BeanFactory::getBean('HAM_WOOP',$_REQUEST['record']);

			$wo_id = $_REQUEST['ham_wo_id'];

			$bean_wo = BeanFactory :: getBean('HAM_WO', $wo_id);

			$this->bean->wo_number = "[" . $bean_wo->wo_number . "] " . $bean_wo->name;
			$this->bean->ham_wo_id = $wo_id;

			global $db;
			$sel = "SELECT woop_number
												                            FROM ham_woop
												                            WHERE ham_woop.deleted =0 AND ham_wo_id = '" . $wo_id . "'
												                                ORDER BY ham_woop.woop_number DESC
												                                LIMIT 0 , 1";
			$bean_woop_list = $db->query($sel);
			$last_woop_number = 0;
			while ($last_woop = $db->fetchByAssoc($bean_woop_list)) {
				$last_woop_number = $last_woop['woop_number'];
			}

			if ($last_woop_number > 0) {
				$this->bean->woop_number = floor(($last_woop_number +10) / 10) * 10;
			} else {
				$this->bean->woop_number = "10";
			}
			
			//echo "wo_id = ".$this->bean->ham_wo_id;
			if (isset ($this->bean->ham_wo_id)) {
				$ham_wo_bean = BeanFactory::getBean("HAM_WO",$wo_id);
				echo '<script>var ham_wo_id="' . $ham_wo_bean->id . '";</script>';
				echo '<script>var wo_status="' . $ham_wo_bean->wo_status . '";</script>';
				echo '<script>var next_woop_assignment="' . $ham_wo_bean->next_woop_assignment. '";</script>';
			}	
		}
		$last_woop_flag = "N";
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
			if (isset ($wo_id)) {
				$ham_wo_bean = BeanFactory::getBean("HAM_WO",$wo_id);
				echo '<script>var ham_wo_id="' . $ham_wo_bean->id . '";</script>';
				echo '<script>var wo_status="' . $ham_wo_bean->wo_status . '";</script>';
				echo '<script>var next_woop_assignment="' . $ham_wo_bean->next_woop_assignment. '";</script>';
			}
			echo '<script>var last_woop_number_flag="' . $last_woop_flag . '";</script>';

		}

		parent :: Display();
	}

}