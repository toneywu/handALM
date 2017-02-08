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
require_once('modules/HAA_Menus/HAA_Menus_sugar.php');
class HAA_Menus extends HAA_Menus_sugar {
	
	function __construct(){
		parent::__construct();
	}
	
	function save($check_notify){
		global $current_user;
		$this->id=parent::save($check_notify);
		$post_data=$_POST;
		$key="line_";
		$line_count = isset($post_data[$key . 'deleted']) ? count($post_data[$key . 'deleted']) : 0;
        $j = 0;
        for ($i = 0; $i < $line_count; ++$i) {
        	$lines = new HAA_Menus_Lists();
            if ($post_data[$key . 'deleted'][$i] == 1) {
                $lines->mark_deleted($post_data[$key . 'id'][$i]);
            } else {
                foreach ($lines->field_defs as $field_def) {
                    $field_name = $field_def['name'];
                    if (isset($post_data[$key . $field_name][$i])) {
                        $lines->$field_name = $post_data[$key . $field_name][$i];
                    }
                }
                $lines->menu_id=$this->id;
                $lines->currency_id=$this->currency_id;
                $lines->assigned_user_id=$current_user->id;
	            $lines->save($check_notify);
	        }
	    }
	}

	function menuHeadData(){
		global $db;
        $menuheaddata=array();
		$haa_frameworks_id=$_SESSION["current_framework"];
        $menu_sql="SELECT
            haa_menus.id,
            haa_menus.name
        FROM
            haa_menus
        WHERE
            haa_menus.deleted = 0
            AND haa_menus.navigate_display_flag=1
            AND haa_menus.enabled_flag=1"." 
            AND (haa_menus.haa_frameworks_id_c='' or haa_menus.haa_frameworks_id_c is null  ".
            	" OR haa_menus.haa_frameworks_id_c= '".$haa_frameworks_id."') 
             ORDER BY haa_menus.sort_order";
        $result=$db->query($menu_sql);
        $labelnum=0;
        while($row=$db->fetchByAssoc($result)){
            $menuheaddata[$labelnum]['id']=$row['id'];
            $menuheaddata[$labelnum]['label']=$row['name'];
            $labelnum++;
        }
        return $menuheaddata;
	}

	function menusData(){
		global $db;
		$haa_frameworks_id=$_SESSION["current_framework"];
        $menus=array();
		$menus_sql="SELECT
			haa_menus.id,
			IFNULL(haa_functions.func_module,haa_menus_lists.func_module) func_module,
			haa_menus_lists.field_lable_zhs,
			haa_menus_lists.func_icon,
			haa_functions.function_code,
			haa_functions.haa_ff_id_c,
			haa_functions.parameters
		FROM
			haa_menus
		LEFT JOIN haa_menus_lists ON haa_menus.id = haa_menus_lists.menu_id
		LEFT JOIN haa_functions ON  haa_functions.id=haa_menus_lists.function_id
		WHERE
		1=1
		AND haa_menus.deleted=0
		AND haa_menus.enabled_flag=1
		AND haa_menus.navigate_display_flag=1
		AND haa_menus_lists.deleted=0
		AND haa_menus_lists.enabled_flag=1
		AND (haa_menus_lists.deleted IS NULL OR haa_menus_lists.deleted=0)
		AND (haa_menus_lists.enabled_flag IS NULL OR haa_menus_lists.enabled_flag=1)
		AND (haa_functions.deleted IS NULL OR haa_functions.deleted=0)
		AND (haa_menus.haa_frameworks_id_c='' or haa_menus.haa_frameworks_id_c is null  ".
            	" OR haa_menus.haa_frameworks_id_c= '".$haa_frameworks_id."') 
		 ORDER BY haa_menus_lists.sort_order ASC";
		$result=$db->query($menus_sql);
		$menus_num=0;
        while($row=$db->fetchByAssoc($result)){
        	$url="index.php?module=".$row['func_module']."&action=index";
        	if ($row['haa_ff_id_c']) {
        		$url.="&function_code=".$row['function_code']."&haa_ff_id=".$row['haa_ff_id_c'];
        	}
        	if ($row['parameters']) {
        		$url.="&".$row['parameters'];
        	}
        	$menus[$menus_num]['parent_id']=$row['id'];
            $menus[$menus_num]['url']=$url;
            $menus[$menus_num]['label']=$row['field_lable_zhs'];
            $menus[$menus_num]['img']=$row['func_icon'];
            $menus_num++;
        }
        return $menus;
	}
}
?>