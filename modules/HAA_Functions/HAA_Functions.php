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
require_once('modules/HAA_Functions/HAA_Functions_sugar.php');
class HAA_Functions extends HAA_Functions_sugar {
	
	function __construct(){
		parent::__construct();
	}
	
	function save($check_notify = FALSE){
		global $current_user;
		$this->id=parent::save($check_notify);
		$post_data=$_POST;
		$key="line_";
		$line_count = isset($post_data[$key . 'deleted']) ? count($post_data[$key . 'deleted']) : 0;
        for ($i = 0; $i < $line_count; ++$i) {
        	$lines = new HAA_Functions_lines();
            if ($post_data[$key . 'deleted'][$i] == 1) {
                $lines->mark_deleted($post_data[$key . 'id'][$i]);
            } else {
                foreach ($lines->field_defs as $field_def) {
                    $field_name = $field_def['name'];
                    if (isset($post_data[$key . $field_name][$i])) {
                        $lines->$field_name = $post_data[$key . $field_name][$i];
                    }
                }
                $lines->currency_id=$this->currency_id;
                $lines->assigned_user_id=$current_user->id;
	            $lines->save($check_notify);
	            if (!$post_data['line_id'][$i]) {//新建才加关联关系
	            	$table='haa_functions_haa_functions_lines_c';
	            	$relate_values = array('deleted' =>0 ,
	            	'haa_functions_haa_functions_lineshaa_functions_ida'=>$this->id,
	            	'haa_functions_haa_functions_lineshaa_functions_lines_idb'=>$lines->id );
	            }
	            parent::set_relationship($table,$relate_values);
	        }
	    }
	}

	function getExtMenu(){
		global $db,$current_user;
		/*$level_sql="SELECT
		l.user_group_id,
		users.id user_name_id
		FROM(
			SELECT
				haa_functions_lines.user_group_id,
				accounts.`name` user_group,
				haa_functions_lines.user_name_id,
				users.user_name
			FROM
				haa_functions_lines
			LEFT JOIN haa_functions_haa_functions_lines_c ON haa_functions_lines.id = haa_functions_haa_functions_lines_c.haa_functions_haa_functions_lineshaa_functions_lines_idb
			LEFT JOIN haa_functions ON haa_functions.id = haa_functions_haa_functions_lines_c.haa_functions_haa_functions_lineshaa_functions_ida
			LEFT JOIN users ON haa_functions_lines.user_name_id = users.id
			LEFT JOIN accounts ON haa_functions_lines.user_group_id = accounts.id
			WHERE 1 = 1
			AND haa_functions.deleted = 0
			AND haa_functions_lines.deleted = 0
			AND haa_functions_lines.enable_flag = 1
			AND (accounts.deleted = 0 OR accounts.deleted IS NULL)) l
 		LEFT JOIN users_cstm ON (l.user_group_id = users_cstm.account_id_c OR l.user_group_id = '')
 		LEFT JOIN users ON users.id = users_cstm.id_c
		WHERE( users.id = l.user_name_id OR l.user_name IS NULL)";//su.deleted为什么会是1
		$res=$db->query($level_sql);
		while ($line=$db->fetchByAssoc($res)) {
			if ($line['user_group_id']==""&&$line['user_name_id']!="") {//权限用户只有用户时
				$users[]=$line['user_name_id'];
			}
			if ($line['user_group_id']!=""&&$line['user_name_id']!=""&&$line['user_name_id']==$line['user_id']) {					//权限用户在权限组中，但指定了用户时
				$users[]=$line['user_name_id'];
			}
			if ($line['user_group_id']!=""&&$line['user_name_id']=="") {//只指定了权限组时
				$users[]=$line['user_id'];
			}
		}//将用户、权限组、权限组-用户全部转化为用户
		array_unique($users);//去除重复用户*/
		$sql="SELECT
			haa_functions.id,
			haa_functions.function_module,
			haa_functions.name,
			haa_functions.function_code,
			haa_functions.parameters,
			haa_functions.haa_ff_id_c,
			haa_codes.`name` haa_ff
		FROM
			haa_functions
		LEFT JOIN haa_codes ON haa_functions.haa_ff_id_c = haa_codes.id
		WHERE
			1 = 1
		AND haa_functions.deleted = 0";//获取扩展url信息
		$result=$db->query($sql);
		$modules=array();
		while ( $row=$db->fetchByAssoc($result)) {
			$level_flag=false;
			if ($current_user->id==1) {
				$url=$row['function_module'].'&function_code='.$row['function_code'].'&haa_ff_id='.$row['haa_ff_id_c'].$row['parameters'];
				$modules[0][$url]=$row['name'];
			}else if(in_array($current_user->id, $users)){
				$url=$row['function_module'].'&function_code='.$row['function_code'].'&haa_ff_id='.$row['haa_ff_id_c'].$row['parameters'];
				$modules[0][$url]=$row['name'];
			}
		}

		$modules['topMenuName']="功能导航";
		return $modules;
	}
}
?>