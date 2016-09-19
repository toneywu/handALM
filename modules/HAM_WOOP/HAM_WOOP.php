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

		global $db;
		$id = $this->id;
		$sql = "select woop_status from ham_woop where ham_woop.id='" . $id . "'";
		$results = $db->query($sql);
		$current_db_status = "";

		while ($result = $db->fetchByAssoc($results)) {
			$current_db_status = $result['woop_status'];
		}

		//没什么特殊的，就是工序在APPROVED之后可以手工变为WSCH、WMATL、WPCOND。 如果是这3个状态，同时同步工单状态=Y，就去修改工作单状态
		if ($current_db_status == "APPROVED" && ($this->woop_status == "WSCH" || $this->woop_status == "WMATL" || $this->woop_status == "WPCOND") && $this->syn_wo_status == "Y") {

			$wo_bean = BeanFactory :: getBean("HAM_WO", $this->ham_wo_id);
			$wo_bean->wo_stauts = $this->woop_status;
			$wo_bean->saveWO(false, 'O', $this->woop_status);
		}

		$next_woop = "SELECT woop_number
										FROM ham_woop
										WHERE ham_woop.deleted =0 AND ham_wo_id = '" . $this->ham_wo_id . "' and woop_number>" . $this->woop_number . "
										ORDER BY ham_woop.woop_number ASC
										LIMIT 0 , 1";
		$next_woop_bean = BeanFactory :: getBean("HAM_WOOP")->get_full_list("woop_number ASC", "ham_woop.ham_wo_id ='" . $this->ham_wo_id . "' and woop_number>" . $this->woop_number, "", "0");

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
		//echo "current_db_status=".$current_db_status."<br>";
		//echo "show_status=".$show_status."<br>";
		if ($current_db_status <> $show_status && ($show_status == "COMPLETED" || $show_status == "CLOSED")) {
			//非最后一道工序
			if ($last_woop_number <> $this->woop_number) {
				if ($this->autoopen_next_task == "Y" && $next_woop_bean[0]->woop_status = "WPREV") {
					$next_woop_bean[0]->woop_status = "APPROVED";
				}
				//echo "autoopen_next_task=".$this->autoopen_next_task."<br>";
				//echo "next woop_status=".$next_woop_bean[0]->woop_status."<br>";
				//echo "work_center_res_id=".$this->work_center_res_id."<br>";
				//echo "work_center_people_id=".$this->work_center_people_id."<br>";
				$wo_bean = BeanFactory :: getBean("HAM_WO", $this->ham_wo_id);
				if ($wo_bean->next_woop_assignment == 1) {
					$next_woop_bean[0]->work_center_res_id = $this->work_center_res_id;
					$next_woop_bean[0]->work_center_people_id = $this->work_center_people_id;
				}
				$next_woop_bean[0]->save();

			} else {
				//最后一道工序 在工序完成后，立刻跳转到工作单完工界面中。 
				//add by yuan.chen 2016-09-19
				$wo_bean = BeanFactory :: getBean("HAM_WO", $this->ham_wo_id);
				if ($wo_bean->complete_by_last_woop == true) {
					$woop_bean = BeanFactory :: getBean("HAM_WOOP", $this->id);
					$woop_bean->wo_status = 'COMPLETED';
					$woop_bean->save();
					parent :: save($check_notify);
					$queryParams = array (
						'module' => 'HAM_WO',
						'action' => 'EditView',
						'record' => $this->ham_wo_id,
						'fromWoop' => 'Y',
						'last_woop_id'=>$this->id,
						
					);
					SugarApplication :: redirect('index.php?' . http_build_query($queryParams));
				}
			}
		}

		parent :: save($check_notify);
	}

	function get_list_view_data() {
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate;
		$woop_fields = $this->get_list_view_array();

		if (isset ($_GET['record'])) {
			$ham_wo_id = $_GET['record'];
		} else {
			$ham_wo_id = $this->ham_wo_id;
		}
		$woop_status = isset ($this->woop_status) ? $this->woop_status : "";

		if (($woop_status == "APPROVED" || $woop_status == "WSCH" || $woop_status == "WMATL" || $woop_status == "WPCOND" || $woop_status == "INPRG" || $woop_status == "REWORK") && (empty ($this->action) || $this->action != 'Popup')) {
			if (empty ($this->work_center_people)) {
				$woop_fields['WORK_CENTER_PEOPLE'] = '<a href="#" class="button" onclick=assignWoop("' . $this->id . '","' . $ham_wo_id . '")>' . translate('LBL_TAKE_OWNERSHIP', 'HAM_WOOP') . '</a>';
				//$WO_fields['WOOP_ACTION'] = $assign_btn;
			}

			if (!empty ($this->act_module) && !empty ($this->work_center_people)) {
				//有动作模块，并且已经有人员分配
				$woop_fields['ACT_MODULE'] = '<a href="#" class="button" onclick=window.location.href="index.php?module=' . $this->act_module . '&action=EditView&woop_id=' . $this->id . '">' . $app_list_strings['ham_woop_moduleList'][$this->act_module] . '</a>';

				if ($this->act_module == 'HIT_IP_TRANS_BATCH') {
					$hit_ip_trans_batch_bean = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list("date_entered desc", "hit_ip_trans_batch.source_woop_id='" . $this->id . "'");
					if (count($hit_ip_trans_batch_bean) != 0) {
						$it_trans_batch_id = $hit_ip_trans_batch_bean[0]->id;
						$woop_fields['ACT_MODULE'] = '<a href="#" class="button" onclick=window.location.href="index.php?module=' . $this->act_module . '&record=' . $it_trans_batch_id . '&action=EditView&woop_id=' . $this->id . '">' . $app_list_strings['ham_woop_moduleList'][$this->act_module] . '</a>';
					}
				} else
					if ($this->act_module == 'HAT_Asset_Trans_Batch') {

						$asset_trans_beans = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list("date_entered desc", "hat_asset_trans_batch.source_woop_id='" . $this->id . "'");
						if (count($asset_trans_beans) != 0) {
							$asset_trans_id = $asset_trans_beans[0]->id;
							$woop_fields['ACT_MODULE'] = '<a href="#" class="button" onclick=window.location.href="index.php?module=' . $this->act_module . '&record=' . $asset_trans_id . '&action=EditView&woop_id=' . $this->id . '">' . $app_list_strings['ham_woop_moduleList'][$this->act_module] . '</a>';
						}
					}

			}
		}

		$WO_fields = $this->get_list_view_array();
		//为工作单的状态着色
		if (!empty ($woop_status))
			$woop_fields['WOOP_STATUS'] = "<span class='color_tag color_doc_status_" . $woop_status . "'>" . $app_list_strings['ham_wo_status_list'][$woop_status] . "</span>";

		return $woop_fields;
	}

	function __construct() {
		parent :: __construct();
	}
}
?>