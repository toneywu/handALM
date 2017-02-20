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
require_once('modules/HAA_Period_Sets/HAA_Period_Sets_sugar.php');
class HAA_Period_Sets extends HAA_Period_Sets_sugar {
	
	function __construct(){
		parent::__construct();
	}


	function save($check_notify = FALSE){
		global $sugar_config;

		// if ($this->batch_number == '') {
		// 	$bean_frameworks = BeanFactory :: getBean('HAA_Frameworks', $this->haa_frameworks_id_c);//以参数传值时只能传ID值，否则发创建Bean，因此用以下方法创建。
		// 	$bean_numbering = BeanFactory :: getBean('HAA_Numbering_Rule',$bean_frameworks->haa_asset_counting_rule_id);
		// 	if (!empty($bean_numbering)) {
		// 			//取得当前的编号
		// 		$this->batch_number = $bean_numbering->nextval;
		// 			//预生成下一个编号，并保存在$bean_numbering中
		// 		$current_number = ($bean_numbering->current_number) + 1;
		// 		$current_numberstr = "" . $current_number;
		// 		$padding_str = "";
		// 		for ($i = 0; $i < ($bean_numbering->min_num_strlength); $i++) {
		// 			$padding_str = $padding_str +"0";
		// 		}
		// 		$padding_str = substr($padding_str, 0, strlen($padding_str) - strlen($current_numberstr)) + $current_numberstr;
		// 		$nextval_str = ($bean_numbering->perfix) . $padding_str;
		// 		$bean_numbering->current_number = $current_number;
		// 		$bean_numbering->nextval = $nextval_str;
		// 		$bean_numbering->save();
		// 	}
		// }
        $this->name =  $this->calendar_name;
		$this->id=parent::save($check_notify);
		$post_data=$_POST;
		$line_count = isset($post_data['line_deleted']) ? count($post_data['line_deleted']) : 0;
		
        for ($i = 0; $i < $line_count; ++$i) {
        	$key="line_";
        	$lines = new HAA_Periods();
            if ($post_data[$key . 'deleted'][$i] == 1) {
                $lines->mark_deleted($post_data[$key . 'id'][$i]);
            } else {
                foreach ($lines->field_defs as $field_def) {
                    $field_name = $field_def['name'];
                    if (isset($post_data[$key . $field_name][$i])) {
                        $lines->$field_name = $post_data[$key . $field_name][$i];
                    }

                }

	             $lines->haa_period_sets_id_c = $this->id;
	             $lines->name = $post_data[$key .'period_name'][$i];;
	            // var_dump($lines->sort_order);
	             
	             $lines->save($check_notify);
	        }
	    }
		
	}
	
}
?>