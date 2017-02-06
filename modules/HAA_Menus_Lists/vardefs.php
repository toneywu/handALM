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

$dictionary['HAA_Menus_Lists'] = array(
	'table'=>'haa_menus_lists',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
			'menu_name' =>
			array(
				'required' => true,
		      	'source' => 'non-db',
		      	'name' => 'menu_name',
		      	'vname' => 'LBL_MENU_NAME',
		      	'type' => 'relate',
		      	'massupdate' => 0,
		      	'no_default' => false,
		      	'comments' => '',
		      	'help' => '',
		      	'importable' => 'true',
		      	'duplicate_merge' => 'disabled',
		      	'duplicate_merge_dom_value' => '0',
		      	'audited' => false,
		      	'inline_edit' => true,
		      	'reportable' => true,
		      	'unified_search' => false,
		      	'merge_filter' => 'disabled',
		      	'len' => '255',
		      	'size' => '20',
		      	'id_name' => 'menu_id',
		      	'ext2' => 'HAA_Menus',
		      	'module' => 'HAA_Menus',
		      	'rname' => 'name',
		      	'quicksearch' => 'enabled',
		    	'studio' => 'visible',
			),
			'menu_id' =>
			array(
				'required' => false,
		      	'name' => 'menu_id',
		      	'vname' => 'LBL_MENU_ID',
		      	'type' => 'id',
		      	'massupdate' => 0,
		      	'no_default' => false,
		      	'comments' => '',
		      	'help' => '',
		      	'importable' => 'false',
		      	'duplicate_merge' => 'disabled',
		      	'duplicate_merge_dom_value' => 0,
		      	'audited' => false,
		      	'inline_edit' => true,
		      	'reportable' => false,
		      	'unified_search' => false,
		      	'merge_filter' => 'disabled',
		      	'len' => 36,
		      	'size' => '20',
			),
			'sort_order' =>
			 array(
			 	'required' => true,
		        'name' => 'sort_order',
		        'vname' => 'LBL_SORT_ORDER',
		        'type' => 'int',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => '',
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 3,
		        'size' => '20',
		        'studio' => 'visible',
		        'dependency' => false,
			 ),
			'field_lable_zhs' => 
			array(
				'required' => true,
		        'name' => 'field_lable_zhs',
		        'vname' => 'LBL_FIELD_LABLE_ZHS',
		        'type' => 'varchar',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => '',
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 255,
		        'size' => '20',
		        'studio' => 'visible',
		        'dependency' => false,
			),
			'field_Lable_us' => 
			array(
				'required' => false,
		        'name' => 'field_Lable_us',
		        'vname' => 'LBL_FIELD_LABLE_US',
		        'type' => 'varchar',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => '',
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 255,
		        'size' => '20',
		        'studio' => 'visible',
		        'dependency' => false,
			),
			'func_module' =>
			array(
				'required' => true,
		        'name' => 'func_module',
		        'vname' => 'LBL_FUNC_MODULE',
		        'type' => 'enum',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => '',
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 100,
		        'size' => '20',
		        'options' => 'modulelist',
		        'studio' => 'visible',
		        'dependency' => false,
			),
			'function_name' => 
			array(
				'required' => false,
		        'source' => 'non-db',
		        'name' => 'function_name',
		        'vname' => 'LBL_FUNCTION_NAME',
		        'type' => 'relate',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => true,
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => '255',
		        'size' => '20',
		        'id_name' => 'function_id',
		        'ext2' => 'HAA_Functions',
		        'module' => 'HAA_Functions',
		        'rname' => 'name',
		        'quicksearch' => 'enabled',
		        'studio' => 'visible',
			),
			'function_id' =>
			array(
				'required' => false,
		        'name' => 'function_id',
		        'vname' => 'LBL_FUNCTION_ID',
		        'type' => 'id',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => 0,
		        'audited' => false,
		        'inline_edit' => true,
		        'reportable' => false,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 36,
		        'size' => '20',
			),
			'display_hsize' =>
			array(
				'required' => true,
		        'name' => 'display_hsize',
		        'vname' => 'LBL_DISPLAY_HSIZE',
		        'type' => 'int',
		        'massupdate' => 0,
		        'no_default' => false,
		        'comments' => '',
		        'help' => '',
		        'importable' => 'true',
		        'duplicate_merge' => 'disabled',
		        'duplicate_merge_dom_value' => '0',
		        'audited' => false,
		        'inline_edit' => '',
		        'reportable' => true,
		        'unified_search' => false,
		        'merge_filter' => 'disabled',
		        'len' => 3,
		        'size' => '20',
		        'studio' => 'visible',
		        'options' => 'haa_listview_align_code',
		        'dependency' => false,
			),
			'func_icon' =>
			array(
				'required' => false,
			    'name' => 'func_icon',
			    'vname' => 'LBL_FUNC_ICON',
			    'type' => 'varchar',
			    'massupdate' => 0,
			    'comments' => '',
			    'help' => '',
			    'importable' => 'true',
			    'duplicate_merge' => 'disabled',
			    'duplicate_merge_dom_value' => '0',
			    'audited' => false,
			    'inline_edit' => false,
			    'reportable' => true,
			    'unified_search' => false,
			    'merge_filter' => 'disabled',
			),
			'enabled_flag'=>
			 array(
			 	'required' => false,
			    'name' => 'enabled_flag',
			    'vname' => 'LBL_ENABLED_FLAG',
			    'type' => 'bool',
			    'massupdate' => 0,
			    'default' => '0',
			    'no_default' => false,
			    'comments' => '',
			    'help' => '',
			    'importable' => 'true',
			    'duplicate_merge' => 'disabled',
			    'duplicate_merge_dom_value' => '0',
			    'audited' => false,
			    'inline_edit' => true,
			    'reportable' => true,
			    'unified_search' => false,
			    'merge_filter' => 'disabled',
			    'len' => '255',
			    'size' => '20',
			 ),
		),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAA_Menus_Lists','HAA_Menus_Lists', array('basic','assignable','security_groups'));
