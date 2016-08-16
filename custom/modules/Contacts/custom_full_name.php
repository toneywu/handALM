<?php
    /**
     * Class ContactLogics
     */
    class ContactLogics {

        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */
		//CUX：更新全名格式，格式为[工号]中文名 FirstName LastName，如 [1185]吴若童 Toney Wu
        public function logic_fill_name($bean, $event, $arguments) {
			
			$nameparts = '';
			
			if (!empty(trim($bean->employee_number_c))) {
				$nameparts = '['.trim($bean->employee_number_c).']';
			}
			if (!empty(trim($bean->chinese_name_c))) {
				$nameparts = $nameparts.trim($bean->chinese_name_c);
			}
			
			/*if (!empty(trim($bean->salutation))) {
				$nameparts = $nameparts.' '.trim($bean->salutation_c);
			}*/
			if (!empty(trim($bean->first_name_c))) {
				$nameparts = $nameparts.' '.trim($bean->first_name_c);
			}
			if (!empty(trim($bean->last_name_c))) {
				$nameparts = $nameparts.' '.trim($bean->last_name_c);
			}			
			if (empty(trim($nameparts))) {
				$bean->name = 'Name unknown'; 
			}else{
				$bean->salutation = '';
				$bean->first_name = ''; 
				$bean->last_name = $nameparts; 
			}		
        }
		//CUX：更新如果Office电话为空，就以Mobile进行填充
		public function logic_fill_phone($bean, $event, $arguments) {
			if (empty(trim($bean->phone_work))) {
				$bean->phone_work = $bean->phone_mobile;
			}
		}
    }

	?>