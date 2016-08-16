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
require_once('modules/HAM_Work_Center_People/HAM_Work_Center_People_sugar.php');
class HAM_Work_Center_People extends HAM_Work_Center_People_sugar {
	
	function __construct(){
		parent::__construct();
	}
	
		function get_list_view_data(){
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		 global $app_list_strings, $timedate;

			$WO_fields = $this->get_list_view_array();
			
			/*foreach($WO_fields as $x=>$x_value)
				  {
				  echo "Key=" . $x . ", Value=" . $x_value;
				  echo "<br>";
				  }

			if(!empty($WO_fields['CONTACT_ID'])){
				$bean_contact = BeanFactory::getBean('Contacts', $WO_fields['CONTACT_ID']);
				echo 'id = '.$bean_contact->contact_id;
				echo 'id = '.$bean_contact->linked_user_c;
				echo 'account_name = '.$bean_contact->account_name;
			}*/
			
			//为工作单的状态着色
			if (!empty($this->contact_id))
				$bean_contact = BeanFactory::getBean('Contacts', $WO_fields['CONTACT_ID']);
				$WO_fields['ORGANIZATION_NAME'] = $this->bean->organization_name = isset($bean_contact->account_name)?$bean_contact->account_name:''; //将bean中的数据复制到@this->bean->map_lat }
				$WO_fields['USER_NAME'] = $this->bean->user_name = isset($bean_contact->linked_user_c)?$bean_contact->linked_user_c:''; //将bean中的数据复制到@this->bean->map_lat }
			    //$WO_fields['WO_STATUS'] = "<span class='color_tag color_doc_status_{$this->organization_name}'>".$app_list_strings['organization_name'][$this->organization_name]."</span>";
			return $WO_fields;
	}
}
?>