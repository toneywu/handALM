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

$dictionary['HAT_Asset_QUAL_Details'] = array(
	'table'=>'hat_asset_qual_details',
	'audited'=>true,
	'inline_edit'=>true,
	'duplicate_merge'=>true,
	'fields'=>array (
		'hat_asset_qual_id' => 
		array (
			'required' => false,
			'name' => 'hat_asset_qual_id',
			'vname' => 'LBL_HAT_ASSET_QUAL_ID',
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
		'hat_asset_qual' => 
		array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'hat_asset_qual',
			'vname' => 'LBL_ASSET_QUAL',
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
			'id_name' => 'hat_asset_qual_id',
			'ext2' => 'HAT_Asset_QUAL',
			'module' => 'HAT_Asset_QUAL',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
			),
		
		'location' =>
		array (
        'source' => 'non-db', //显示当前地点的说明
        'name' => 'location',
        'vname' => 'LBL_LOCATION',
        'type' => 'varchar',
        'default'=>'',
        'reportable' => true,
        'studio' => 'visible'
        ),
		'location_desc' =>
		array (
        'source' => 'non-db', //显示当前地点的说明
        'name' => 'location_desc',
        'vname' => 'LBL_LOCATION_DESC',
        'type' => 'varchar',
        'default'=>'',
        'reportable' => true,
        'studio' => 'visible'
        ),
		'interval_period' => 
		array (
			'required' => true,
			'name' => 'interval_period',
			'vname' => 'LBL_INTERVAL',
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
			'len' => '255',
			'size' => '20',
			'enable_range_search' => false,
			'disable_num_format' => '',
			'min' => false,
			'max' => false,
			),
		'interval_uom' =>
		array (
			'required' => true,
			'default' => "DAY",
			'name' => 'interval_uom',
			'vname' => 'LBL_INTERVAL_UOM',
			'type' => 'enum',
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
			'options' => 'haa_interval_uom',
			),
		'qual_org_id' => 
		array (
			'required' => false,
			'name' => 'qual_org_id',
			'vname' => 'LBL_QUAL_ORG_ID',
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
		'qual_org' => 
		array (
			'required' => false,
            'source' => 'non-db', //显示最新监测单位
            'name' => 'qual_org',
            'vname' => 'LBL_QUAL_ORG',
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
            'id_name' => 'qual_org_id',
            'ext2' => 'Accounts',
            'module' => 'Accounts',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),
		'qual_date' => 
		array (
			'required' => false,
			'name' => 'qual_date',
			'vname' => 'LBL_QUAL_DATE',
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
			),
		'qual_result_passed' => 
		array (
			'required' => false,
			'name' => 'qual_result_passed',
			'vname' => 'LBL_QUAL_RESULT_PASSED',
			'type' => 'bool',
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
		'effective_date' => 
		array (
			'required' => false,
			'name' => 'effective_date',
			'vname' => 'LBL_EFFECTIVE_DATE',
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
			),
		'qual_range' =>
		array (
			'required' => false,
			'name' => 'qual_range',
			'vname' => 'LBL_QUAL_RANGE',
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
		'measure_precision' =>
		array (
			'required' => false,
			'name' => 'measure_precision',
			'vname' => 'LBL_MEASURE_PRESION',
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
		),
'relationships'=>array (
	),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
	require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAT_Asset_QUAL_Details','HAT_Asset_QUAL_Details', array('basic','assignable','security_groups'));