<?php


/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once ('modules/HAM_WO/HAM_WO_sugar.php');
class HAM_WO extends HAM_WO_sugar {

	function saveWO($check_notify = false, $onlySave, $wo_status) {
		if ($onlySave == "O") {
			$this->wo_status = $wo_status;
			parent :: save($check_notify); //保存WO主体
		}
	}

	function save($check_notify = false) {
//		echo $_POST['isDuplicate'];
//		foreach ( $_POST as $key => $value ) {
//       			echo "****key = ".$key.",value=".$value."<br>";
//			}
		//在保存之前通过getNumbering生成WO编号
		// 用于产生自动编号
		if ($this->wo_number == ''||!empty($_POST['duplicateId'])) {
			$bean_site = BeanFactory :: getBean('HAM_Maint_Sites', $this->ham_maint_sites_id);
			$bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule', $bean_site->wo_haa_numbering_rule_id);

			if (!empty ($bean_numbering)) {
				//取得当前的编号
				$this->wo_number = $bean_numbering->nextval;
				//预生成下一个编号，并保存在$bean_numbering中
				$current_number = $bean_numbering->current_number + 1;
				$current_numberstr = "" . $current_number;
				$padding_str = "";
				for ($i = 0; $i < $bean_numbering->min_num_strlength; $i++) {
					$padding_str = $padding_str +"0";
				}
				$padding_str = substr($padding_str, 0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
				$nextval_str = $bean_numbering->perfix . $padding_str;
				$bean_numbering->current_number = $current_number;
				$bean_numbering->nextval = $nextval_str;
				$bean_numbering->save();
			}
		}

		// 在资产事务处理保存时判断，如果事务处理的行状态达标，则更新资产状态
		$focus_wo_status = $this->wo_status;
		if ($focus_wo_status == 'SUBMITTED') {
			$this->wo_status = 'APPROVED';
			//TODO:以后再加入真正的工作流判断，临时只要提交都会通过
		} else
			if ($focus_wo_status == 'APPROVED') {
			}
		$check_bean = BeanFactory :: getBean("HAM_WO");
		$db_bean = $check_bean->get_full_list('', "ham_wo.id ='" . $this->id . "'");
		//数据库里面的 活动 只要工单状态为拟定，并且活动字段发生了变化，都将工序删除，重新从活动从COPY 
		if (!empty ($db_bean)) {
			$db_act_id = $db_bean[0]->activity;
			/*echo 'db_act_id = ' . $db_act_id . "<br>";
			echo 'activity = ' . $this->activity . "<br>";
			echo 'id = ' . $this->id . "<br>";*/
			if ($this->wo_status == "DRAFT" && $db_bean[0]->activity != null && $db_bean[0]->activity != $this->activity) {
				$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('', "ham_woop.ham_wo_id ='" . $this->id . "'");
				if (!empty ($ham_woops)) {
					foreach ($ham_woops as $ham_woop) {
						//echo $ham_woop->id;
						$ham_woop->mark_deleted($ham_woop->id);
						$ham_woop->save();
					}
				}
			}
		}

		//工作单审批通过时（APPROVED）会将工单下第一道工序状态变为已批准（APPROVED）。其余工序状态变为等待前序（WPREV）。
		//这里的第一道工序、以及后序工序不包括已经删除、取消或结束的工序
		if (($this->wo_status == "SUBMITTED" || $this->wo_status == "APPROVED")&&$db_bean[0]->wo_status!="APPROVED") {
			//工作单审批后会判断计划时间如果没有填写，如果没有进行手工排程，按目标时间进行默认
			if ($this->date_schedualed_start == "") { $this->date_schedualed_start = $this->date_target_start; }
			if ($this->date_schedualed_finish == "") { $this->date_schedualed_finish = $this->date_target_finish; }
			if ($this->plan_fixed == "") { $this->plan_fixed = true; }


			//遍历工序

			$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('WOOP_NUMBER', "ham_woop.woop_status not in ('CLOSED','CANCELED') and ham_wo_id='" . $this->id . "'");

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
		}
		elseif ($this->wo_status == "CANCELED"&&$db_bean[0]->wo_status!="CANCELED") {
			$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('WOOP_NUMBER', "ham_woop.woop_status not in ('COMPLETED','CLOSED') and ham_wo_id='" . $this->id . "'");
			if (!empty ($ham_woops)) {

				foreach ($ham_woops as $key => $value) {
					$ham_woops[$key]->woop_status = "CANCELED";
					$ham_woops[$key]->save();
				}

			}
		}
		elseif (($this->wo_status == "COMPLETED" || $this->wo_status == "CLOSED")&&($db_bean[0]->wo_status!="COMPLETED"&&$db_bean[0]->wo_status!="CLOSED")) {
			$ham_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('WOOP_NUMBER', "ham_wo_id='" . $this->id . "'");
			if (!empty ($ham_woops)) {

				foreach ($ham_woops as $key => $value) {
					$ham_woops[$key]->woop_status = $this->wo_status;
					$ham_woops[$key]->save();
				}
			}
		}
		
		if (isset ($this->source_type) && $this->source_type != "") {
			//$this->source_type="";
			//1 通过合同找合同条目 
			//2将合同条目插入到工单对象行里面去
			$contract_product_beans = BeanFactory :: getBean('AOS_Products_Quotes')->get_full_list('', "aos_products_quotes.parent_id = '{$this->contract_id}'");
			foreach ($contract_product_beans as $contract_product_bean) {
				$ham_wo_line_bean = BeanFactory :: newBean("HAM_WO_Lines");
				$ham_wo_line_bean->ham_wo_id = $this->id;
				$ham_wo_line_bean->product_id = $contract_product_bean->product_id;
				$ham_wo_line_bean->quantity = $contract_product_bean->product_qty;
				$ham_wo_line_bean->contract_id = $this->contract_id;
				$ham_wo_line_bean->save();
			}
		}

		parent :: save($check_notify); //保存WO主体
		//add by yuan.chen@2016-07-22
		$bean_id = $this->activity;
		//echo "activity=".$this->activity;
		//活动头
		$ham_act = BeanFactory :: getBean('HAM_ACT', $bean_id);

		$ham_act_op = BeanFactory :: newBean('HAM_ACT_OP');
		$ham_act_ops = $ham_act_op->get_full_list('', "ham_act_op.ham_act_id ='" . $bean_id . "'");

		$checkBean = BeanFactory :: getBean("HAM_WOOP");
		$ham_woops = $checkBean->get_full_list('', "ham_woop.ham_wo_id ='" . $this->id . "'");
		//echo 'ham_woops='.count($ham_woops);
		if (count($ham_woops) == 0) {
			//<1>.引用标准作业动力
			if (count($ham_act_ops) > 0 && $bean_id != null) {
				$index = 1;
				$pre_date_target_finish = null;
				$pre_date_schedualed_finish = null;

				foreach ($ham_act_ops as $ham_act_op) {

					$ham_woop = BeanFactory :: getBean('HAM_WOOP');
					$ham_woop->name = $ham_act_op->name;
					//echo 'activity_status=' . $ham_act_op->activity_status;
					$ham_woop->woop_status = $ham_act_op->activity_status;
					$ham_woop->ham_work_center_id = $ham_act_op->sr_work_center_rule_id;
					$ham_woop->work_center_res_id = $ham_act_op->work_center_res_id;
					
					$ham_woop->woop_number = $ham_act_op->activity_op_number;
					//$ham_woop->description=$this->name;
					if ($index == 1) {
						$ham_woop->date_target_start = $this->date_target_start;
						$ham_woop->date_target_finish = $this->date_target_finish;
						$ham_woop->date_schedualed_start = $this->date_schedualed_start;
						$ham_woop->date_schedualed_finish = $this->date_schedualed_finish;
						$pre_date_target_finish = $this->date_target_finish;
						$pre_date_schedualed_finish = $this->date_schedualed_finish;
						if(empty($ham_woop->ham_wo_id)&&($this->wo_status == "SUBMITTED" || $this->wo_status == "APPROVED")){
							$ham_woop->woop_status = "APPROVED";
						}
					} else {
						$ham_woop->date_target_start = $pre_date_target_finish;
						$ham_woop->date_schedualed_start = $pre_date_schedualed_finish;
						//计划开始时间+Duration后，计划出计划完成时间
						$ham_woop->date_target_finish = $this->get_finish_date($pre_date_target_finish, $ham_act_op->standard_hour);
						$ham_woop->date_schedualed_finish = $this->get_finish_date($pre_date_schedualed_finish, $ham_act_op->standard_hour);

						$pre_date_target_finish = $ham_woop->date_target_finish;
						$pre_date_schedualed_finish = $ham_woop->date_schedualed_finish;
					}
					$ham_woop->ham_wo_id = $this->id;
					$ham_woop->autoopen_next_task = $ham_act_op->autoopen_next_task;
					$ham_woop->act_module = $ham_act_op->act_module;
					$ham_woop->hat_eventtype_id = $ham_act_op->hat_eventtype_id;
					$ham_woop->save();
					$index++;
				}
			} else {

				//<2>.如果没有引用标准的活动 那么 
				//系统会基于工作单的负责人相关信息。自动建立一道10工序（工序号=10%，复制工作单的工作中心、
				//资源、负责人、工作单状态、目标开始时间、目标完成时间、计划开始时间、计划完成时间，工序标题=默认工序（LBL_DEFAULT_WOOP_NAME））
				//你可以继续完成其它工序的添加
				$ham_woop_bean = BeanFactory :: newBean("HAM_WOOP");
				$ham_woop_bean->woop_number = "10";
				$ham_woop_bean->ham_wo_id = $this->id;
				$ham_woop_bean->ham_work_center_id = $this->work_center_id;
				$ham_woop_bean->work_center_res_id = $this->work_center_res_id;
				$ham_woop_bean->work_center_people_id = $this->work_center_people;
				$ham_woop_bean->woop_status = $this->wo_status;
				$ham_woop_bean->date_target_start = $this->date_target_start;
				$ham_woop_bean->date_target_finish = $this->date_target_finish;
				$ham_woop_bean->date_schedualed_start = $this->date_schedualed_start;
				$ham_woop_bean->date_schedualed_finish = $this->date_schedualed_finish;
				$ham_woop_bean->name = "默认工序";
				$ham_woop_bean->save();
			}
		}

		$contract_id = $this->contract_id;
		//合同
		$contacts_bean = BeanFactory :: getBean('AOS_Contracts', $contract_id);

		$contact_products_bean = BeanFactory :: newBean('AOS_Products_Quotes');
		$contact_products_beans = $contact_products_bean->get_full_list('', "aos_products_quotes.parent_id ='" . $contract_id . "'");

		$check_wo_line = BeanFactory :: getBean("HAM_WO_Lines");
		//importantent
		$check_wo_lines = BeanFactory :: getBean('HAM_WO_Lines')->get_full_list('', "ham_wo_lines.contract_id = '{$this->contract_id}' AND ham_wo_lines.ham_wo_id = '{$this->id}'");

		if (count($check_wo_lines) == 0) {

			if ($contact_products_beans != null) {
				foreach ($contact_products_beans as $contact_products_bean) {
					$ham_wo_line = BeanFactory :: getBean('HAM_WO_Lines');
					$ham_wo_line->contract_id = $this->contract_id;
					$ham_wo_line->ham_wo_id = $this->id;
					$ham_wo_line->product_id = $contact_products_bean->product_id;
					$ham_wo_line->quantity = $contact_products_bean->product_qty;
					$ham_wo_line->uom_id = $contact_products_bean->product_qty;
					//通过产品 找到 单位 
					$product_bean = BeanFactory :: getBean("AOS_Products", $contact_products_bean->product_id);
					/*foreach($product_bean as $key=>$value){
						echo "<br> key = ".$key."--->".var_dump($value);
					}*/
					$ham_wo_line->uom_id = $product_bean->haa_uom_id_c;
					$ham_wo_line->save();
				}
			}
		}
		//die();
		//工作单保存之后，将对应的SR关联到工作单上
		//TODO：SR状态可能是WORKING或是完成
		if ($this->source_type == "SR" & !empty ($this->source_id)) { //将对应的SR进行关联
			$bean_sr = BeanFactory :: getBean('HAM_SR', $this->source_id);
			$bean_sr->ham_wo_id = $this->id;
			$bean_sr->sr_status = "WORKING";
			$bean_sr->save();
		}
	}

	function get_finish_date($star_date, $duration) {
		$finishi_date = null;

		if (empty ($duration)) {
			$duration = 0;
		}

		if (empty ($star_date)) {
			$finishi_date = null;
		} else {
			$finishi_date = date("Y-m-d  H:i:s", strtotime("$star_date   +$duration   hour"));
		}
		//echo   "start_date = ".date("Y-m-d  H:i:s",strtotime("$star_date   +$duration   hour"))+"<br>";

		//echo "get_finish_date====>start_date = ".$star_date.",duration=".$duration.",finishi_date=".$finishi_date."<br>";
		return $finishi_date;
	}

	function get_list_view_data() {
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate;

		$WO_fields = $this->get_list_view_array();
		//为工作单的状态着色
		if (!empty ($this->wo_status))
			$WO_fields['WO_STATUS_VAL'] = $this->wo_status;

		return $WO_fields;
	}

	function __construct() {
		parent :: __construct();
	}

	function saveContracts($check_notify) {
		echo "ready to save" . $this->contract_id;
		//1 通过合同找合同条目 
		//2将合同条目插入到工单对象行里面去
		$contract_product_beans = BeanFactory :: getBean('AOS_Products_Quotes')->get_full_list('', "aos_products_quotes.parent_id = '{$this->contract_id}'");

		foreach ($contract_product_beans as $key => $value) {
			$ham_wo_line_bean = BeanFactory :: newBean("HAM_WO_Lines");
			$ham_wo_line_bean->ham_wo_id = $this->id;
			$ham_wo_line_bean->product_id = $contract_product_beans->product_id;
			$ham_wo_line_bean->quantity = $contract_product_beans->product_qty;
			$ham_wo_line_bean->contract_id = $this->contract_id;
			$ham_wo_line_bean->save();
		}
		parent :: save($check_notify); //保存WO主体

	}

}
?>