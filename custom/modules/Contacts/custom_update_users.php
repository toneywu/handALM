<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class updateSYSUser {

        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */
		//CUX：将当前Contact信息同步到User表中
		/*在User、Contact 对象，增加以下字段。
			chinese_name_c, first_name_c, last_name_c,employee_number_c, salutation_c
*/
        public function update_SYSUser($bean, $event, $arguments) {
			if (($bean->sync_user_c)==1) {//如果不是1就直接退出
				if (!empty($bean->user_id_c)) {
					//echo('$bean->user_id_c'.$bean->user_id_c);
					$linked_user = BeanFactory::getBean('Users',$bean->user_id_c);				
					
					$linked_user->first_name 		= $bean->first_name;//经过客户化first_name没有什么作用			
					$linked_user->last_name 		= $bean->last_name;//经过客户化Last_name就是Display name
					$linked_user->chinese_name_c 	= $bean->chinese_name_c;
					$linked_user->first_name_c 		= $bean->first_name_c;
					$linked_user->last_name_c 		= $bean->last_name_c;
					$linked_user->employee_number_c = $bean->employee_number_c;
					$linked_user->salutation_c 		= $bean->salutation_c;
					$linked_user->title 			= $bean->title;
					$linked_user->department 		= $bean->department;
					$linked_user->phone_mobile 		= $bean->phone_mobile;
					$linked_user->phone_work 		= $bean->phone_work;
					$linked_user->phone_home 		= $bean->phone_home;
					$linked_user->phone_other 		= $bean->phone_other;
					$linked_user->phone_fax 		= $bean->phone_fax;
					$linked_user->address_city 		= $bean->primary_address_city;
					$linked_user->address_country 	= $bean->primary_address_country;
					$linked_user->address_postalcode= $bean->primary_address_postalcode;
					$linked_user->address_state 	= $bean->primary_address_state;	
					$linked_user->address_street 	= $bean->primary_address_street;
					$linked_user->reports_to_id 	= $bean->reports_to_id;
					
					$linked_user->contact_id_c 		= $bean->id;
					$linked_user->sync_contact_c	= 0;

					$contact_email = new SugarEmailAddress; 
					$user_email = new SugarEmailAddress;
					
					$user_email->addAddress($contact_email -> getPrimaryAddress($bean), true); //Users标准的Email和客户化的Primary_email_c两个字段
					$linked_user->primart_email_c = $contact_email -> getPrimaryAddress($bean);				
				
					$linked_user->save();
					$user_email->save($linked_user->id, "Users");

				}
			}
			
		}
		
    }

	?>