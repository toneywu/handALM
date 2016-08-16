<?php

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class UserAfterSaveLogics {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */
		 
		//FIXED20160212-已知BUG，获取不到当前User的Email，因为在本AfterSave完成之后 ，才会再执行创建Email的动作。
		
		//CUX：将当前Contact信息同步到User表中
		/*在User、Contact 对象，增加以下字段。
			chinese_name_c, first_name_c, last_name_c,employee_number_c, salutation_c*/
   
	   public function sync_contact($bean, $event, $arguments) {

		if (($bean->sync_contact_c)==1) { //如果=1则更新Contact，否则不再更新Contact直接退出
			$bean->sync_contact_c=0;
		   	
			if (empty($bean->linked_contact_c)){
			//if ture:没有关联Contact，在此条件可能需要新增Contact，也可能不再新增Contact
				if (empty($bean->fetched_row['id'])) {// 如果$bean->fetched_row['id']为空，表示是在新增记录，否则是在更新记录
					//如果$bean->fetched_row['id']为空=ture 如果是正在新增User时
					if (!empty($bean->contact_organization_c)){
						//if ture 关联了Organization，但是没有关联Contact，又是新增User，在此条件下需要新增Contact
						$linked_contact = BeanFactory::getBean('Contacts');//标记为新增一个Contact
						$linked_contact->new_with_id = true;
						$linked_contact->id = create_guid();
					}
				} 
			} else {
			//有关联了Contact，在此条件需要更新Contact
				$linked_contact = BeanFactory::getBean('Contacts',$bean->contact_id_c);//标记为更新一个老Contact
			}	
			
			if (!empty($linked_contact)){			
				$linked_contact->first_name 		= $bean->first_name;//经过客户化first_name没有什么作用(Before save时清空)			
				$linked_contact->last_name 			= $bean->last_name;//经过客户化Last_name就是Display name（同上）
				$linked_contact->type_c 			= 'INTERNAL';
				$linked_contact->chinese_name_c 	= $bean->chinese_name_c;
				$linked_contact->first_name_c 		= $bean->first_name_c;
				$linked_contact->last_name_c 		= $bean->last_name_c;
				$linked_contact->employee_number_c 	= $bean->employee_number_c;
				$linked_contact->salutation_c 		= $bean->salutation_c;
				$linked_contact->title 				= $bean->title;
				$linked_contact->department 		= $bean->department;
				$linked_contact->phone_mobile 		= $bean->phone_mobile;
				$linked_contact->phone_work 		= $bean->phone_work;
				$linked_contact->phone_home 		= $bean->phone_home;
				$linked_contact->phone_other 		= $bean->phone_other;
				$linked_contact->phone_fax 			= $bean->phone_fax;
				$linked_contact->reports_to_id		= $bean->reports_to_id;
				
				$linked_contact->primary_address_city 		= $bean->address_city;
				$linked_contact->primary_address_country 	= $bean->address_country;
				$linked_contact->primary_address_postalcode	= $bean->address_postalcode;
				$linked_contact->primary_address_state 		= $bean->address_state;	
				$linked_contact->primary_address_street 	= $bean->address_street;		

				$linked_contact->user_id_c 	= $bean->id;
				$linked_contact->account_id = $bean->account_id_c;
				$linked_contact->sync_user_c = 0;
				
				
				//$GLOBALS['log']->error('User debug: custom_sync_contact - start');
				//$GLOBALS['log']->error('User debug: custom_sync_contact - $bean->primary_email_c='.$bean->primary_email_c);
				
				$contact_email = new SugarEmailAddress; 
				//$user_email = new SugarEmailAddress; 
				//$linked_contact->primar_email_c	=	$user_email->getPrimaryAddress($bean);
				$contact_email->addAddress($bean->primary_email_c, true); 
				
				$linked_contact->save();
				$contact_email->save($linked_contact->id, "Contacts");
			}
		}
	  }		
    }

	?>