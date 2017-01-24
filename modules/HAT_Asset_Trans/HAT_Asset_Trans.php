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
require_once('modules/HAT_Asset_Trans/HAT_Asset_Trans_sugar.php');
class HAT_Asset_Trans extends HAT_Asset_Trans_sugar {

	function get_list_view_data() {

		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		global $app_list_strings, $timedate;
		$line_fields = $this->get_list_view_array();
		$line_fields['DESCRIPTION'] =html_entity_decode($this->description);

		$current_bean = BeanFactory::getBean("HAT_Asset_Trans", $this->id);

		$HA_bean = BeanFactory::getBean("HAT_Assets", $current_bean->asset_id);
		$line_fields['ASSET'] = '<a href="index.php?module=HAT_Assets&action=DetailView&record='.$HA_bean->id.'">'.$HA_bean->name."</a>";

		$HATB_bean = BeanFactory::getBean("HAT_Asset_Trans_Batch", $current_bean->batch_id,array(),false);//显示已经删除的头，以防找不到头
		$line_fields['HEADER'] = "";
		if (!empty($HATB_bean->tracking_number)){
			$line_fields['HEADER'] ="[".$HATB_bean->tracking_number."]";
		}
		$line_fields['HEADER'] = '<a href="index.php?module=HAT_Asset_Trans_Batch&action=DetailView&record='.$HATB_bean->id.'">'.$HATB_bean->name."</a>";

		return $line_fields;
	}


	function __construct(){
		parent::__construct();
	}
}
?>