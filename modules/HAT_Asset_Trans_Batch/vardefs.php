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

$dictionary['HAT_Asset_Trans_Batch'] = array(
	'table'=>'hat_asset_trans_batch',
	'audited'=>true,
	'inline_edit'=>true,
	'duplicate_merge'=>true,
	'fields'=>array (
		'name' => 
		array (
			'name' => 'name',
			'vname' => 'LBL_NAME',
			'type' => 'name',
			'link' => true,
			'dbType' => 'varchar',
			'len' => '255',
			'unified_search' => true,
			'full_text_search' => 
			array (
				'boost' => 3,
				),
			'required' => true,
			'importable' => 'required',
			'duplicate_merge' => 'disabled',
			'merge_filter' => 'disabled',
			'massupdate' => 0,
			'no_default' => false,
			'comments' => '',
			'help' => '',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'inline_edit' => true,
			'reportable' => true,
			'size' => '20',
			),
		'tracking_number' =>  array (
			'name' => 'tracking_number',
			'vname' => 'LBL_TRACKING_NUMBER',
			'type' => 'varchar',
			'len' => '255',
			'unified_search' => true,
			'required' => false,
			'importable' => 'required',
			'duplicate_merge' => 'disabled',
			'merge_filter' => 'disabled',
			'massupdate' => 0,
			'no_default' => false,
			'comments' => '',
			'help' => '',
			'duplicate_merge_dom_value' => '0',
			'audited' => false,
			'inline_edit' => true,
			'reportable' => true,
			'size' => '20',
			),
		'asset_trans_status' => 
		array (
			'required' => true,
			'name' => 'asset_trans_status',
			'vname' => 'LBL_ASSET_TRANS_STATUS',
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
		'planned_execution_date' => 
		array (
			'required' => false,
			'name' => 'planned_execution_date',
			'vname' => 'LBL_PLANNED_EXECUTION_DATE',
			'type' => 'date',
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
			),
		'lov_cux_event_type_option_list' =>
		array (
								'source' => 'non-db', //从EventType映射
								'name' => 'lov_cux_event_type_option_list',
								'vname' => 'LBL_EVENT_TYPE_OPTION_LIST',
								'type' => 'enum',
								'default'=>'',
								'reportable' => true,
								'studio' => 'visible',
								'options' => 'cux_event_type_option_list',
								),
		'lov_asset_status_list' =>
		array (
								'source' => 'non-db', //从EventType映射
								'name' => 'lov_asset_status_list',
								'vname' => 'LBL_ASSET_STATUS_LIST',
								'type' => 'enum',
								'default'=>'',
								'reportable' => true,
								'studio' => 'visible',
								'options' => 'asset_status_list',
								),
		'target_asset_status' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'target_asset_status',
			  'vname' => 'LBL_TARGET_ASSET_STATUS',
			  'type' => 'varchar',// 'enum',
			  'default'=>'',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'asset_status_list',
			  ),
		'change_location' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_location',
			  'vname' => 'LBL_CHANGE_LOCATION',
			  'type' =>'varchar',// 'enum',
			  'default' => 'OPTIONAL',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'cux_event_type_option_list',
			  ),
		'processing_asset_status' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'processing_asset_status',
			  'vname' => 'LBL_PROCESSING_ASSET_STATUS',
			  'type' => 'varchar',//'enum',
			  'default'=>'',
			  'reportable' => true,
			  'studio' => 'visible',
			 // 'options' => 'asset_status_list',
			  ),
		'change_organization' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_organization',
			  'vname' => 'LBL_CHANGE_ORGANIZATION',
			  'type' => 'varchar',//'enum',
			  'default' => 'OPTIONAL',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'cux_event_type_option_list',
			  ),
		'change_contact' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_contact',
			  'vname' => 'LBL_CHANGE_CONTACT',
			  'type' =>'varchar',// 'enum',
			  'default' => 'OPTIONAL',
			  'reportable' => true,
			  'studio' => 'visible',
			 // 'options' => 'cux_event_type_option_list',
			  ),
		'change_oranization_le' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_oranization_le',
			  'vname' => 'LBL_CHANGE_ORANIZATION_LE',
			  'type' => 'varchar',//'enum',
			  'default' => 'OPTIONAL',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'cux_event_type_option_list',
			  ),
		'change_location_desc' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_location_desc',
			  'vname' => 'LBL_CHANGE_LOCATION_DESC',
			  'type' => 'varchar',////'enum',
			  'default' => 'OPTIONAL',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'cux_event_type_option_list',
			  ),
		'require_approval_workflow' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'require_approval_workflow',
			  'vname' => 'LBL_REQUIRE_APPROVAL_WORKFLOW',
			  'type' =>'varchar',// 'enum',
			  'default' => 'LOCKED',
			  'reportable' => true,
			  'studio' => 'visible',
			 // 'options' => 'cux_event_type_option_list',
			  ),		
		'require_confirmation' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'require_confirmation',
			  'vname' => 'LBL_REQUIRE_CONFIRMATION',
			  'type' =>'varchar',// 'enum',
			  'default' => 'LOCKED',
			  'reportable' => true,
			  'studio' => 'visible',
			 // 'options' => 'cux_event_type_option_list',
			  ),	
		'change_target_status' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_target_status',
			  'vname' => 'LBL_CHANGE_TARGET_STATUS',
			  'type' => 'varchar',// 'enum',
			  'default' => '0',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'dom_int_bool',
			  ),	
		'change_processing_status' => 
		array ( 
			  'source' => 'non-db', //从EventType映射
			  'name' => 'change_processing_status',
			  'vname' => 'LBL_CHANGE_PROCESSING_STATUS',
			  'type' =>'varchar',// 'enum',
			  'default' => '0',
			  'reportable' => true,
			  'studio' => 'visible',
			  //'options' => 'dom_int_bool',
			  ),		

		'hat_domains_id' => 
		array (
			'required' => false,
			'name' => 'hat_domains_id',
			'vname' => 'LBL_DOMAIN_ID',
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
		'domain' => 
		array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'domain',
			'vname' => 'LBL_DOMAIN',
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
			'id_name' => 'hat_domains_id',
			'ext2' => 'HAT_Domains',
			'module' => 'HAT_Domains',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
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
VardefManager::createVardef('HAT_Asset_Trans_Batch','HAT_Asset_Trans_Batch', array('basic','assignable','security_groups'));