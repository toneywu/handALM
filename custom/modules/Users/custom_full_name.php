<?php

    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	class UserLogics {

        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */
		//CUX：更新全名格式，格式为[工号]中文名 FirstName LastName，如 [1185]吴若童 Toney Wu
        public function logic_fill_name_phone($bean, $event, $arguments) {
			echo "<br/>last_name=".$bean->last_name;

				$nameparts = '';

				if (!empty($bean->employee_number_c) && trim($bean->employee_number_c)!="") {
					$nameparts = '['.trim($bean->employee_number_c).']';
				}
				if (!empty($bean->chinese_name_c) && trim($bean->chinese_name_c)!="") {
					$nameparts = $nameparts.trim($bean->chinese_name_c);
				}
				/*if (!empty(trim($bean->salutation))) {
					$nameparts = $nameparts.' '.trim($bean->salutation_c);
				}*/
				if (!empty($bean->first_name_c) && trim($bean->first_name_c)!="") {
					$nameparts = $nameparts.' '.trim($bean->first_name_c);
				}
				if (!empty($bean->last_name_c) && trim($bean->last_name_c)!="") {
					$nameparts = $nameparts.' '.trim($bean->last_name_c);
				}
				if (empty($nameparts) || trim($nameparts)=="") {
					$bean->name = 'Name unknown';
				}else{
					$bean->salutation = '';
					$bean->first_name = '';
					$bean->last_name = $nameparts;
				}

				if (empty($bean->phone_work) || trim($phone_work)=="") {
					$bean->phone_work = $bean->phone_mobile;
				}
		}
    }

	?>