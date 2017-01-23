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
require_once ('modules/HIT_ODF_REL/HIT_ODF_REL_sugar.php');
class HIT_ODF_REL extends HIT_ODF_REL_sugar {

	function __construct() {
		parent :: __construct();
	}

	function save($check_notify = false) {
		//在保存之前通过getNumbering生成WO编号
		// 用于产生自动编号
		if ($this->jump_number == '' || !empty ($_POST['duplicateId'])) {
			$bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule')->retrieve_by_string_fields(array (
					'document_type' => 'ODFREL'
			
			));
			
			if (!empty ($bean_numbering)) {
				//取得当前的编号
				$this->jump_number = $bean_numbering->nextval;
				$this->name=$this->jump_number;
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
		parent :: save($check_notify); //保存WO主体

	}
	
	
	function get_list_view_data() {
		global $app_list_strings, $timedate, $db;

		$ODF_fields = $this->get_list_view_array();
		//为工作单的状态着色
		if (!empty ($this->a_odf_mark)){
			$asset_bean = BeanFactory :: getBean('HAT_Assets',$this->a_odf_mark);
			$ODF_fields['A_ODF_MARK_NAME'] = $asset_bean->attribute5;
		}
		if (!empty ($this->b_odf_mark)){
			$asset_bean = BeanFactory :: getBean('HAT_Assets',$this->b_odf_mark);
			$ODF_fields['B_ODF_MARK_NAME'] = $asset_bean->attribute9;
		}	



		return $ODF_fields;
	}

}
?>