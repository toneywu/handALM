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

$dictionary['HAA_Shortcuts'] = array(
	'table'=>'haa_shortcuts',
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
		'shortcut_icon' =>
		array (
			'required' => false,
			'name' => 'shortcut_icon',
			'vname' => 'LBL_ICON',
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
		'sequence_number' =>
		array (
			'required' => false,
			'name' => 'sequence_number',
			'vname' => 'LBL_SEQUENCE_NUMBER',
			'type' => 'varchar',
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
			'len' => '3',
			'size' => '3',
			),
		'code_shortcut_scenario_id' =>
		array (
			'inline_edit' => 1,
			'required' => false,
			'name' => 'code_shortcut_scenario_id',
			'vname' => 'LBL_SCENARIO_ID',
			'type' => 'id',
			'massupdate' => '0',
			'default' => NULL,
			'no_default' => false,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => false,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => '36',
			'size' => '20',
			'id' => 'code_shortcut_scenario_id',
			),
		'code_shortcut_scenario' =>
		array (
			'inline_edit' => '',
			'required' => false,
			'source' => 'non-db',
			'name' => 'code_shortcut_scenario',
			'vname' => 'LBL_SCENARIO',
			'type' => 'relate',
			'massupdate' => '0',
			'default' => NULL,
			'no_default' => false,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'reportable' => true,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => '255',
			'size' => '20',
			'id_name' => 'code_shortcut_scenario_id',
			'ext2' => 'HAA_Codes',
			'module' => 'HAA_Codes',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			'id' => 'code_shortcut_scenario_id',
			),
		'shortcut_module' =>
		array(
			'required' => true,
			'name' => 'shortcut_module',
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
		'shortcut_action' =>
		array(
			'required' => true,
			'name' => 'shortcut_action',
			'vname' => 'LBL_SHORTCUT_ACTION',
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
			'options' => 'haa_shortcut_action_list',
			'studio' => 'visible',
			'dependency' => false,
			),
		'url' =>
		array (
			'required' => false,
			'name' => 'url',
			'vname' => 'LBL_URL',
			'type' => 'varchar',
			'massupdate' => 0,
			'no_default' => false,
			'comments' => 'give a URL if it is not ordinary Edit/List',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'inline_edit' => true,
			'reportable' => true,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => '3',
			'size' => '3',
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
VardefManager::createVardef('HAA_Shortcuts','HAA_Shortcuts', array('basic','assignable','security_groups'));