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

$dictionary['HMM_Trans_Batch'] = array(
	'table'=>'hmm_trans_batch',
	'audited'=>false,
    'inline_edit'=>false,
		'duplicate_merge'=>false,
		'fields'=>array (

		'ham_maint_sites_id' =>
		array (
			'required' => false,
			'name' => 'ham_maint_sites_id',
			'vname' => 'LBL_SITE_HAM_MAINT_SITES_ID',
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
		'site' =>
		array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'site',
			'vname' => 'LBL_SITE',
			'type' => 'relate',
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
			'len' => '255',
			'size' => '20',
			'id_name' => 'ham_maint_sites_id',
			'ext2' => 'HAM_Maint_Sites',
			'module' => 'HAM_Maint_Sites',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
		'hat_event_type_id' =>
		array (
			'required' => false,
			'name' => 'hat_event_type_id',
			'vname' => 'LBL_EVENT_TYPE_ID',
			'type' => 'id',
			'massupdate' => 0,
			'no_default' => false,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => false,
			'inline_edit' => false,
			'reportable' => false,
			'unified_search' => false,
			'merge_filter' => 'disabled',
			'len' => 36,
			'size' => '20',
			),
		'event_type' =>
		array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'event_type',
			'vname' => 'LBL_EVENT_TYPE',
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
			'id_name' => 'hat_event_type_id',
			'ext2' => 'HAT_EventType',
			'module' => 'HAT_EventType',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
		'trans_status' =>
		array (
			'required' => true,
			'name' => 'trans_status',
			'vname' => 'LBL_TRANS_STATUS',
			'type' => 'enum',
			'massupdate' => '1',
			'no_default' => false,
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
			'len' => 100,
			'size' => '20',
			'options' => 'asset_trans_status',
			'studio' => 'visible',
			'dependency' => false,
			'default' => 'DRAFT',
			),
		'trans_basic_type_lov' =>
		array (
			'source' => 'non-db',
			'name' => 'trans_basic_type_lov',
			'vname' => 'LBL_TRANS_BASIC_TYPE',
			'type' => 'enum',
			'reportable' => true,
			'studio' => 'visible',
			'options' => 'cux_event_type_list',
			),
		'trans_basic_type' =>
		array (
			'source' => 'non-db',
			'name' => 'trans_basic_type',
			'vname' => 'LBL_TRANS_BASIC_TYPE',
			'type' => 'varchar',
			'reportable' => true,
			'studio' => 'visible',
			),
		'line_items' =>
		array (
                'required' => false,
                'name' => 'line_items',
                'vname' => 'LBL_LINE_ITEMS',
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
                        'name' => 'display_lines',
                        'returns' => 'html',
                        'include' => 'modules/HMM_Trans_Batch/Render_HMM_Line_Items.php'
                    ),
			),
'hmm_mo_requests_id' =>
		array (
			'required' => false,
			'name' => 'hmm_mo_requests_id',
			'vname' => 'LBL_HMM_MO_REQUESTS_ID',
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
		'hmm_mo_request' =>
		array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'hmm_mo_request',
			'vname' => 'LBL_HMM_MO_REQUESTS',
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
			'id_name' => 'hmm_mo_requests_id',
			'ext2' => 'HMM_MO_Requests',
			'module' => 'HMM_MO_Requests',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
'ham_wo_id' =>
		array (
			'required' => false,
			'name' => 'ham_wo_id',
			'vname' => 'LBL_WO_ID',
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
		'ham_wo' =>
		array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'ham_wo',
			'vname' => 'LBL_WO',
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
			'id_name' => 'ham_wo_id',
			'ext2' => 'HAM_WO',
			'module' => 'HAM_WO',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
		'ham_woop_id' =>
		array (
			'required' => false,
			'name' => 'ham_woop_id',
			'vname' => 'LBL_WOOP_ID',
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
		'ham_woop' =>
		array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'ham_woop',
			'vname' => 'LBL_WOOP',
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
			'id_name' => 'ham_woop_id',
			'ext2' => 'HAM_WOOP',
			'module' => 'HAM_WOOP',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
	'trans_date' =>
		array (
			'required' => true,
			'name' => 'trans_date',
			'vname' => 'LBL_TRANS_DATE',
			'type' => 'datetimecombo',
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
			'size' => '20',
			'enable_range_search' => false,
			'dbType' => 'datetime',
			'display_default' => 'now',
			),
		'secondary_unit_defaulting_lov' =>
		array (
			'source' => 'non-db',
			'name' => 'secondary_unit_defaulting_lov',
			'vname' => 'LBL_SECONDARY_UNIT_DEFAULTING',
			  'type' => 'enum',// 'enum',
			  'reportable' => true,
			  'studio' => 'visible',
			  'options' => 'cux_products_secondary_unit_defaulting_list',
			  ),
		'tracking_uom_lov' =>
		array (
			'source' => 'non-db',
			'name' => 'tracking_uom_lov',
			'vname' => 'LBL_TRACKING_UOM',
			  'type' => 'enum',// 'enum',
			  'reportable' => true,
			  'studio' => 'visible',
			  'options' => 'cux_products_uom_usage_list',
			  ),
		'locator_control_lov' =>
		array (
			'source' => 'non-db',
			'name' => 'locator_control_lov',
			'vname' => 'LBL_LOCATOR_CONTROL',
			  'type' => 'enum',// 'enum',
			  'reportable' => true,
			  'studio' => 'visible',
			  'options' => 'hat_inventory_node_list',
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
VardefManager::createVardef('HMM_Trans_Batch','HMM_Trans_Batch', array('basic','assignable','security_groups'));