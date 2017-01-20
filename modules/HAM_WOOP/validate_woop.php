<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
	global $db;
//用于在工序状态变动前进行校验，核对相关的单据状态
		$woop_number = $_REQUEST["woop_number"];
		$ham_wo_id   = $_REQUEST["ham_wo_id"];
		$wo_bean = BeanFactory :: getBean("HAM_WO", $ham_wo_id);
		$event_bean = BeanFactory :: getBean("HAT_EventType", $wo_bean->hat_event_type_id);
		$complete_by_last_woop=$wo_bean->complete_by_last_woop;
		
		$sel = "SELECT woop_number
										FROM ham_woop
										WHERE ham_woop.deleted =0 AND ham_wo_id = '" . $ham_wo_id . "'
										ORDER BY ham_woop.woop_number DESC
										LIMIT 0 , 1";

		$bean_woop_list = $db->query($sel);
		$last_woop_number = 0;
		while ($last_woop = $db->fetchByAssoc($bean_woop_list)) {
			$last_woop_number = $last_woop['woop_number'];
		}
		if(!empty($event_bean)&&$event_bean->contract_completed=="COMPLETED"&&$woop_number==$last_woop_number&&$complete_by_last_woop==1&&empty($wo_bean->contract_id)){
			echo "E";
		}else{
			echo "S";
			
		} 
?>