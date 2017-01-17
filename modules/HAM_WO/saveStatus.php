<?php

/*
 * Created on 2016-8-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

$current_id = $_GET['id'];
$status_code = $_GET['status_code'];
$ham_wo_bean = BeanFactory :: getBean('HAM_WO', $current_id);
$ham_wo_bean->wo_status = $status_code;
//请务必pull request
if ($status_code == "SUBMITTED" || $status_code == "APPROVED") {
	$ham_wo_bean->wo_status="APPROVED";
	//工作单审批后会判断计划时间如果没有填写，如果没有进行手工排程，按目标时间进行默认
	if ($ham_wo_bean->date_schedualed_start == "") { 
		$ham_wo_bean->date_schedualed_start = $ham_wo_bean->date_target_start; 
	}
	if ($ham_wo_bean->date_schedualed_finish == "") { 
		$ham_wo_bean->date_schedualed_finish = $ham_wo_bean->date_target_finish;
	}
	if ($ham_wo_bean->plan_fixed == "") { 
		$ham_wo_bean->plan_fixed = true; 
	}
	//遍历工序

	$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('woop_number', "ham_woop.woop_status not in ('CLOSED','CANCELED') and ham_wo_id='" . $current_id . "'");

	if (!empty ($ham_woops)) {

		foreach ($ham_woops as $key => $value) {
			if ($key == 0) {

				$ham_woops[0]->woop_status = "APPROVED";

			} else {
				$ham_woops[$key]->woop_status = "WPREV";
			}
			$ham_woops[$key]->save();
		}

	}
}elseif ($status_code == "CANCELED") {
	$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('WOOP_NUMBER', "ham_woop.woop_status not in ('COMPLETED','CLOSED') and ham_wo_id='" . $this->id . "'");
	if (!empty ($ham_woops)) {

		foreach ($ham_woops as $key => $value) {
			$ham_woops[$key]->woop_status = "CANCELED";
			$ham_woops[$key]->save();
		}
	}
}elseif (($status_code == "COMPLETED" || $status_code == "CLOSED")) {
	$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('WOOP_NUMBER', "ham_wo_id='" . $this->id . "'");
	if (!empty ($ham_woops)) {

		foreach ($ham_woops as $key => $value) {
			$ham_woops[$key]->woop_status = $status_code;
			$ham_woops[$key]->save();
		}
	}
}

$ham_wo_bean->save();

?>
