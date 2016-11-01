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

$dictionary['HIT_Link_PO'] = array (
	'table' => 'hit_link_po',
	'audited' => true,
	'inline_edit' => true,
	'duplicate_merge' => true,
	'fields' => array (
		//资源编号
	'product_id' => array (
			'required' => false,
			'name' => 'product_id',
			'vname' => 'LBL_PRODUCT_ID',
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

		'product_number' => array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'product_number',
			'vname' => 'LBL_PRODUCT_NUMBER',
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
			'id_name' => 'product_id',
			'ext2' => 'HAT_Assets',
			'module' => 'HAT_Assets',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//资产类型
	'asset_group' => array (
			'source' => 'non-db',
			'name' => 'asset_group',
			'vname' => 'LBL_ASSET_GROUP',
			'type' => 'varchar',
			'default' => '',
			'reportable' => true,
			'studio' => 'visible'
		),
		//专线编号
	'line_number' => array (
			'source' => 'non-db',
			'name' => 'line_number',
			'vname' => 'LBL_LINE_NUMBER',
			'type' => 'varchar',
			'default' => '',
			'reportable' => true,
			'studio' => 'visible'
		),
		//归属机房
	'asset_location' => array (
			'source' => 'non-db',
			'name' => 'asset_location',
			'vname' => 'LBL_ASSET_LOCATION',
			'type' => 'varchar',
			'default' => '',
			'reportable' => true,
			'studio' => 'visible'
		),

		'asset_source_id' => array (
			'required' => false,
			'name' => 'asset_source_id',
			'vname' => 'LBL_ASSET_SOURCE_ID',
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
		//采购订单编号
	'asset_source' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'asset_source',
			'vname' => 'LBL_ASSET_SOURCE',
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
			'id_name' => 'asset_source_id',
			'ext2' => 'HAT_Asset_Sources',
			'module' => 'HAT_Asset_Sources',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),

		'vendor' => array (
			'source' => 'non-db',
			'name' => 'vendor',
			'vname' => 'LBL_VENDOR',
			'type' => 'varchar',
			'default' => '',
			'reportable' => true,
			'studio' => 'visible'
		),

'unit_price' => array (
			'required' => false,
			'name' => 'unit_price',
			'vname' => 'LBL_UNIT_PRICE',
			'type' => 'decimal',
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
			'len' => '18',
			'size' => '20',
			'enable_range_search' => false,
			'precision' => '2',

			
		),
		'currency_id' => array (
			'required' => false,
			'name' => 'currency_id',
			'vname' => 'LBL_CURRENCY',
			'type' => 'id',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => 0,
			'audited' => 0,
			'reportable' => 0,
			'len' => 36,
			'studio' => 'visible',
			'function' => array (
				'name' => 'getCurrencyDropDown',
				'returns' => 'html',

				
			),

			
		),
		//合计金额
	'total_amount' => array (
			'required' => false,
			'name' => 'total_amount',
			'vname' => 'LBL_TOTAL_AMOUNT',
			'type' => 'decimal',
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
			'len' => '18',
			'size' => '20',
			'enable_range_search' => false,
			'precision' => '2',

			
		),
		//成本中心
	'cost_center' => array (
			'required' => false,
			'name' => 'cost_center',
			'vname' => 'LBL_COST_CENTER',
			'type' => 'enum',
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
			'len' => 100,
			'size' => '20',
			'options' => 'hit_cost_center_list',
			'studio' => 'visible',
			'dependency' => false,

			
		),
		//计费单位
	'bill_unit_of_measure' => array (
			'required' => false,
			'name' => 'bill_unit_of_measure',
			'vname' => 'LBL_BILL_UNIT_OF_MEASURE',
			'type' => 'enum',
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
			'len' => 100,
			'size' => '20',
			'options' => 'hit_bill_uom_list',
			'studio' => 'visible',
			'dependency' => false,

			
		),
		//计费数量
	'bill_quantity' => array (
			'required' => false,
			'name' => 'bill_quantity',
			'vname' => 'LBL_BILL_QUANTITY',
			'type' => 'decimal',
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
			'len' => '18',
			'size' => '20',
			'enable_range_search' => false,
			'precision' => '2',

			
		),

		
	),
	'relationships' => array (),
	'optimistic_locking' => true,
	'unified_search' => true,

	
);
if (!class_exists('VardefManager')) {
	require_once ('include/SugarObjects/VardefManager.php');
}
VardefManager :: createVardef('HIT_Link_PO', 'HIT_Link_PO', array (
	'basic',
	'assignable',
	'security_groups'
));