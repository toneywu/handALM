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
require_once('modules/HAOS_Revenues_Quotes/HAOS_Revenues_Quotes_sugar.php');
class HAOS_Revenues_Quotes extends HAOS_Revenues_Quotes_sugar {
	

	function __construct(){
		parent::__construct();
	}


	function save($check_notify = FALSE){
		global $sugar_config;

		if (empty($this->id)  || $this->new_with_id){
			if(isset($_POST['group_id'])) unset($_POST['group_id']);
			if(isset($_POST['product_id'])) unset($_POST['product_id']);
		}

		require_once('modules/AOS_Products_Quotes/AOS_Utils.php');

		perform_aos_save($this);

		parent::save($check_notify);
		$groups=array();
		//生成条目组意义不大，注释掉
		 /*require_once('modules/AOS_Line_Item_Groups/AOS_Line_Item_Groups.php');
		$product_quote_group = new AOS_Line_Item_Groups();

		$product_quote_group->number = 0;
		$product_quote_group->name = $this->expense_group;
		$product_quote_group->assigned_user_id = $this->assigned_user_id;
		$product_quote_group->currency_id = $this->currency_id;
		$product_quote_group->parent_id = $this->id;
		$product_quote_group->parent_type = $this->object_name;
		$product_quote_group->save();*/

		require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
        $productQuote = new AOS_Products_Quotes();
        $productQuote->save_lines($_POST, $this, $groups, 'product_');
}


	function mark_deleted($id)
	{
		$productQuote = new AOS_Products_Quotes();
		$productQuote->mark_lines_deleted($this);
		parent::mark_deleted($id);
	}
}
?>