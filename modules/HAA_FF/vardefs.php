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

$dictionary['HAA_FF'] = array(
	'table'=>'haa_ff',
	'audited'=>true,
	'inline_edit'=>true,
	'duplicate_merge'=>true,
	'fields'=>array (
		'haa_frameworks_id' =>
		array (
			'required' => false,
			'name' => 'haa_frameworks_id',
			'vname' => 'LBL_FRAMEWORK_ID',
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
		'framework' => 
		array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'framework',
			'vname' => 'LBL_FRAMEWORK',
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
			'id_name' => 'haa_frameworks_id',
			'ext2' => 'HAA_Frameworks',
			'module' => 'HAA_Frameworks',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
		'ff_module' =>
		array(
			'required' => true,
			'name' => 'ff_module',
			'vname' => 'LBL_MODULE',
			'type' => 'enum',
			'massupdate' => 0,
			'default' => '',
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => true,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => 100,
			'size' => '20',
			'options' => 'moduleList',
			'studio' => 'visible',
			'dependency' => false,
			),
		'status' =>
		array(
			'required' => false,
			'name' => 'status',
			'vname' => 'LBL_STATUS',
			'type' => 'enum',
			'massupdate' => 1,
			'default' => 'Active',
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => true,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => 100,
			'size' => '20',
			'options' => 'aow_status_list',
			'studio' => 'visible',
			'dependency' => false,
			),
	    'triget_js' => 
	    array (
	      'name' => 'triget_js',
	      'vname' => 'LBL_TRIGER_JS',
	      'type' => 'text',
	      'comment' => 'save the js code.',
	      'rows' => 6,
	      'cols' => 80,
	    ),
		'condition_lines' =>
		array(
			'required' => false,
			'name' => 'condition_lines',
			'vname' => 'LBL_CONDITION_LINES',
			'type' => 'function',
			'source' => 'non-db',
			'massupdate' => 0,
			'comment' => '这个东西好像没有什么用，暂时还没有删除，似乎可以直接删除',
			'importable' => 'false',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => false,
			'reportable' => false,
			'function' =>
			array(
				'name' => 'display_condition_lines',
				'returns' => 'html',
				'include' => 'modules/HAA_FF_Conditions/conditionLines.php'
				),
			),
		'field_lines' =>
		array(
			'required' => false,
			'name' => 'field_lines',
			'vname' => 'LBL_FIELD_LINES',
			'type' => 'function',
			'source' => 'non-db',
			'massupdate' => 0,
			'importable' => 'false',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => false,
			'reportable' => false,
			'function' =>
			array(
				'name' => 'display_field_lines',
				'returns' => 'html',
				'include' => 'modules/HAA_FF_Fields/FieldLines.php'
				),
			),
		'ff_conditions' =>
		array(
			'name' => 'ff_conditions',
			'type' => 'link',
			'relationship' => 'ff_ff_conditions',
			'module' => 'HAA_FF_Conditions',
			'bean_name' => 'HAA_FF_Conditions',
			'source' => 'non-db',
			),
		'ff_fields' =>
		array(
			'name' => 'ff_fields',
			'type' => 'link',
			'relationship' => 'ff_ff_fields',
			'module' => 'HAA_FF_Fields',
			'bean_name' => 'HAA_FF_Fields',
			'source' => 'non-db',
			),
		),
	'relationships'=>array (
		'ff_ff_conditions' =>
		array(
			'lhs_module' => 'HAA_FF',
			'lhs_table' => 'haa_ff',
			'lhs_key' => 'id',
			'rhs_module' => 'HAA_FF_Conditions',
			'rhs_table' => 'haa_ff_conditions',
			'rhs_key' => 'haa_ff_id',
			'relationship_type' => 'one-to-many',
			),
		'ff_ff_fields' =>
		array(
			'lhs_module' => 'HAA_FF',
			'lhs_table' => 'haa_ff',
			'lhs_key' => 'id',
			'rhs_module' => 'HAA_FF_Fields',
			'rhs_table' => 'HAA_FF_Fields',
			'rhs_key' => 'haa_ff_id',
			'relationship_type' => 'one-to-many',
			),
		),
    'indices' => array(
        array(
            'name' => 'haa_ff_index_status',
            'type' => 'index',
            'fields' => array('status'),
        ),
    ),
	'optimistic_locking'=>true,
	'unified_search'=>false,
	);
if (!class_exists('VardefManager')){
	require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAA_FF','HAA_FF', array('basic','assignable','security_groups'));