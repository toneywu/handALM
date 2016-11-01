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
			$SR_fields['SR_STATUS_VAL'] = $this->sr_status;

		return $SR_fields;
	}


	function save($check_notify = false) {
		if ($this->sr_status == 'SUBMITTED') {
			$this->sr_status = 'APPROVED';
		}
		if ($this->sr_status == 'COMPLETE') {
			$this->sr_status = 'CLOSED'; //如果提交时状态为完成，保存后状态为结束。结束状态下没有任何内容可再修改。
		}

		if ($this->sr_status != 'COMPLETE' || $this->sr_status != 'CLOSED') {
			$this->closed_date = "";
			$this->closed_by = "";
			$this->closed_by_id="";
		}


		if ($this->sr_number=='') {
			    $bean_site = BeanFactory::getBean('HAM_Maint_Sites',$this->ham_maint_sites_id);
				$bean_numbering = BeanFactory::getBean('HAA_Numbering_Rule',$bean_site->sr_haa_numbering_rule_id);

				if (isset($bean_numbering)) {

				    $this->sr_number = $bean_numbering->nextval;

				    $current_number    =    $bean_numbering->current_number +1;
			        $current_numberstr = "".$current_number;
			        $padding_str ="";
			        for($i=0; $i<$bean_numbering->min_num_strlength; $i++) {
			        	$padding_str =  $padding_str+ "0";
			        }

			        $padding_str = substr($padding_str,0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
			        $nextval_str = $bean_numbering->perfix.$padding_str;


			        $bean_numbering->current_number = $current_number;
					$bean_numbering->nextval = $nextval_str;
					$bean_numbering->save();
				}
		}

		parent :: save($check_notify); //保存WO主体
	}

	function __construct(){
		parent::__construct();
	}

}
?>