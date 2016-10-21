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
require_once ('modules/HAT_Assets/HAT_Assets_sugar.php');
class HAT_Assets extends HAT_Assets_sugar {

	function get_list_view_data() {
		//资产状态的颜色
		//refer to the task module as an example
		//or refer to the asset module as the first customzation module with this feature
		//global $action, $currentModule, $focus, $current_module_strings, $app_list_strings, $timedate;
		global $app_list_strings;
		$asset_fields = $this->get_list_view_array();

		if (!empty ($this->asset_status)) {
			$asset_fields['ASSET_STATUS_VAL'] = $this->asset_status;
		}

		return $asset_fields;
	}

	function __construct() {
		parent :: __construct();
	}

	function save($check_notify = false) {

		
		echo "number= ".$this->bean->asset_number;
		if ($this->bean->asset_number == null) {
			//1 根据产品 获取产品的资产编号定义
			//asset_group
			$products_bean = BeanFactory :: getBean('AOS_Products')->retrieve_by_string_fields(array (
				'id' => $this->beam->aos_products_id
			));
			$prefix = $products_bean->asset_num_perfix_c;
			$min_num_strlength = $products_bean->asset_num_padding_c;
			
			//定义一个 编号类型在 编号规则里面
				$bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule')->retrieve_by_string_fields(array (
					'document_type' => 'ASSET',
					'perfix'=>$prefix,
					'min_num_strlength'=>$min_num_strlength
				));
			if (empty ($bean_numbering)) {
				//如果没有的话 就新增一个编号规则
				$bean_numbering = BeanFactory :: newBean('HAA_Numbering_Rule');
				$bean_numbering->document_type = 'ASSET';
				$bean_numbering->name = 'Asset';
				$bean_numbering->perfix=$prefix;
				$bean_numbering->min_num_strlength=$min_num_strlength;
				$bean_numbering->current_number=$min_num_strlength;
				$bean_numbering->nextval=$prefix.($bean_numbering->current_number+$min_num_strlength);
				
				$bean_numbering->save();
				$this->asset_number=$prefix.$min_num_strlength;
			}else{
				//如果有定义编号规则的话
				$this->asset_number=$bean_numbering->nextval;
				$bean_numbering->current_number=$this->bean->asset_number;
				$bean_numbering->nextval=$prefix.($bean_numbering->current_number+$min_num_strlength);
				$bean_numbering->save();
			}

		}

		parent :: save($check_notify); //保存Assets主体
	}

}
?>