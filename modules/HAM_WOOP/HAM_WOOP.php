<?php


/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once ('modules/HAM_WOOP/HAM_WOOP_sugar.php');
class HAM_WOOP extends HAM_WOOP_sugar {

	function save($check_notify = false) {

		//		foreach ($this as $key => $value) {
		//			if(is_string($value)){
		//				echo "key = " . $key . ",value = " . $value . "<br>";
		//			}elseif(is_object($value)){
		//				echo var_dump($value)."<br>";
		//				
		//			}
		//			
		//		}

		global $db;
		$id = $this->id;
		$sql = "select woop_status from ham_woop where ham_woop.id='" . $id . "'";
		$results = $db->query($sql);
		$current_db_status = "";
		while ($result = $db->fetchByAssoc($results)) {
			$current_db_status = $result['woop_status'];
		}

		$next_woop = "SELECT woop_number
													    FROM ham_woop
														WHERE ham_woop.deleted =0 AND ham_wo_id = '" . $this->ham_wo_id . "' and woop_number>" . $this->woop_number . "
														ORDER BY ham_woop.woop_number ASC
														LIMIT 0 , 1";
		$next_woop_bean = BeanFactory :: getBean("HAM_WOOP")->get_full_list("woop_number ASC", "HAM_WOOP.ham_wo_id ='" . $this->ham_wo_id . "' and woop_number>" . $this->woop_number, "", "0");

		$show_status = $this->woop_status;
		$sel = "SELECT woop_number
													    FROM ham_woop
														WHERE ham_woop.deleted =0 AND ham_wo_id = '" . $this->ham_wo_id . "'
														ORDER BY ham_woop.woop_number DESC
														LIMIT 0 , 1";

		$bean_woop_list = $db->query($sel);
		$last_woop_number = 0;

		while ($last_woop = $db->fetchByAssoc($bean_woop_list)) {
			$last_woop_number = $last_woop['woop_number'];
		}

		//		if(!empty($next_woop_bean)){
		//			echo "last_woop_number=".$last_woop_number."<br>";
		//			echo "woop_number=".$this->woop_number."<br>";
		//			echo "next bean status = ".$next_woop_bean[0]->woop_status."<br>";
		//			echo "ham_wo_id=".$this->id."<br>";
		//			echo "show_status=".$show_status."<br>";
		//			echo "autoopen_next_task=".$this->autoopen_next_task."<br>";
		//			echo "current_db_status=".$current_db_status."<br>";
		//		}
		//完工的动作
		if ($current_db_status <> $show_status && ($show_status == "COMPLETED" || $show_status == "CLOSED")) {
			//非最后一道工序
			if ($last_woop_number <> $this->woop_number) {
				if ($this->autoopen_next_task == "Y" && $next_woop_bean[0]->woop_status = "WPREV") {
					$next_woop_bean[0]->status = "APPROVED";
				}
				$next_woop_bean[0]->work_center_res_id = $this->work_center_res_id;
				$next_woop_bean[0]->work_center_people_id = $this->work_center_people_id;
				$next_woop_bean->save();
			} else {
				//最后一道工序 在工序完成后，立刻跳转到工作单完工界面中。 
			}
		}
		//die();

		parent :: save($check_notify);
	}

	function get_list_view_data() {
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate;
		$woop_fields = $this->get_list_view_array();
		$ham_wo_id = $_GET['record'];
		if (empty ($this->work_center_people)){
			//$WO_fields['WOOP_ACTION'] = '<a href="index.php?to_pdf=true&module=HAM_WOOP&action=assign_woop_people&id="'.$this->id.'>工单认领</a>';
			$woop_fields['WOOP_ACTION'] = '<a href="#" onclick=assignWoop("'.$this->id.'","'.$ham_wo_id.'")>工单认领</a>';
			//$WO_fields['WOOP_ACTION'] = $assign_btn;
		}
		return $woop_fields;
	}

	function __construct() {
		parent :: __construct();
	}
}
?>