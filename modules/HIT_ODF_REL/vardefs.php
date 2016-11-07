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

$dictionary['HIT_ODF_REL'] = array (
	'table' => 'hit_odf_rel',
	'audited' => true,
	'inline_edit' => true,
	'duplicate_merge' => true,
	'fields' => array (
		//跳接编号
	'jump_number' => array (
			'required' => false,
			'name' => 'jump_number',
			'vname' => 'LBL_JUMP_NUMBER',
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
			'len' => '255',
			'size' => '20',

			
		),
		//使用者
	'odf_user' => array (
			'required' => false,
			'name' => 'odf_user',
			'vname' => 'LBL_ODF_USER',
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
			'len' => '255',
			'size' => '20',

			
		),
		//使用者备注
	'odf_user_content' => array (
			'required' => false,
			'name' => 'odf_user_content',
			'vname' => 'LBL_ODF_USER_CONTENT',
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
			'len' => '255',
			'size' => '20',

			
		),
		//A端机房
	'a_hat_asset_locations_id' => array (
			'required' => false,
			'name' => 'a_hat_asset_locations_id',
			'vname' => 'LBL_A_HAT_ASSET_LOCATIONS_ID',
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

		'a_hat_asset_locations' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'a_hat_asset_locations',
			'vname' => 'LBL_A_HAT_ASSET_LOCATIONS',
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
			'id_name' => 'a_hat_asset_locations_id',
			'ext2' => 'HAT_Asset_Locations',
			'module' => 'HAT_Asset_Locations',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//A端机柜
	'a_hit_racks_id' => array (
			'required' => false,
			'name' => 'a_hit_racks_id',
			'vname' => 'LBL_A_HIT_RACKS_ID',
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

		'a_hit_racks' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'a_hit_racks',
			'vname' => 'LBL_A_HIT_RACKS',
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
			'id_name' => 'a_hit_racks_id',
			'ext2' => 'HIT_Racks',
			'module' => 'HIT_Racks',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//A端ODF架标识
		'a_odf_mark' => 
  array (
    'required' => false,
    'name' => 'a_odf_mark',
    'vname' => 'LBL_A_ODF_MARK',
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
	
		'a_odf_mark_name' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'a_odf_mark_name',
    'vname' => 'LBL_A_ODF_MARK_NAME',
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
    'id_name' => 'a_odf_mark',//返回的值 显示name存储id
    'ext2' => 'HAT_Assets',
    'module' => 'HAT_Assets',
    'rname' => 'attribute5',//在界面上面显示其他模块的 HAT_Assets的Name字段 也就是前台显示
    'quicksearch' => 'enabled',
    'studio' => 'visible',

  ),
		
		
		//A端芯数
	'a_odf_cores' => array (
			'required' => false,
			'name' => 'a_odf_cores',
			'vname' => 'LBL_A_ODF_CORES',
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
			'len' => '255',
			'size' => '20',

			
		),
		//A端下联-机柜编号
	'a_odf_rack_nums' => array (
			'required' => false,
			'name' => 'a_odf_rack_nums',
			'vname' => 'LBL_A_ODF_RACK_NUMS',
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
			'len' => '255',
			'size' => '20',

			
		),
		//A端下联ODF或设备
	'a_odf_assets_id' => array (
			'required' => false,
			'name' => 'a_odf_assets_id',
			'vname' => 'LBL_A_ODF_ASSETS_ID',
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

		'a_odf_assets' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'a_odf_assets',
			'vname' => 'LBL_A_ODF_ASSETS',
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
			'id_name' => 'a_odf_assets_id',
			'ext2' => 'HAT_Assets',
			'module' => 'HAT_Assets',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//A端下联端口或芯数
	'a_odf_ports' => array (
			'required' => false,
			'name' => 'a_odf_ports',
			'vname' => 'LBL_A_ODF_PORTS',
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
			'len' => '255',
			'size' => '20',

			
		),
		//B端机房
	'b_hat_asset_locations_id' => array (
			'required' => false,
			'name' => 'b_hat_asset_locations_id',
			'vname' => 'LBL_B_HAT_ASSET_LOCATIONS_ID',
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

		'b_hat_asset_locations' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'b_hat_asset_locations',
			'vname' => 'LBL_B_HAT_ASSET_LOCATIONS',
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
			'id_name' => 'b_hat_asset_locations_id',
			'ext2' => 'HAT_Asset_Locations',
			'module' => 'HAT_Asset_Locations',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),

		//B端机柜
	'b_hit_racks_id' => array (
			'required' => false,
			'name' => 'b_hit_racks_id',
			'vname' => 'LBL_B_HIT_RACKS_ID',
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

		'b_hit_racks' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'b_hit_racks',
			'vname' => 'LBL_B_HIT_RACKS',
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
			'id_name' => 'b_hit_racks_id',
			'ext2' => 'HIT_Racks',
			'module' => 'HIT_Racks',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//B端ODF架标识
		'b_odf_mark' => 
  array (
    'required' => false,
    'name' => 'b_odf_mark',
    'vname' => 'LBL_B_ODF_MARK',
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
	
		'b_odf_mark_name' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'b_odf_mark_name',
    'vname' => 'LBL_B_ODF_MARK_NAME',
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
    'id_name' => 'b_odf_mark',//返回的值 显示name存储id
    'ext2' => 'HAT_Assets',
    'module' => 'HAT_Assets',
    'rname' => 'attribute9',//在界面上面显示其他模块的 HAT_Assets的Name字段 也就是前台显示
    'quicksearch' => 'enabled',
    'studio' => 'visible',

  ),
		//B端芯数
	'b_odf_cores' => array (
			'required' => false,
			'name' => 'b_odf_cores',
			'vname' => 'LBL_B_ODF_CORES',
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
			'len' => '255',
			'size' => '20',

			
		),
		//B端下联-机柜编号
	'b_odf_rack_nums' => array (
			'required' => false,
			'name' => 'b_odf_rack_nums',
			'vname' => 'LBL_B_ODF_RACK_NUMS',
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
			'len' => '255',
			'size' => '20',

			
		),
		//B端下联ODF或设备
	'b_odf_assets_id' => array (
			'required' => false,
			'name' => 'b_odf_assets_id',
			'vname' => 'LBL_B_ODF_ASSETS_ID',
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

		'b_odf_assets' => array (
			'required' => false,
			'source' => 'non-db',
			'name' => 'b_odf_assets',
			'vname' => 'LBL_B_ODF_ASSETS',
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
			'id_name' => 'b_odf_assets_id',
			'ext2' => 'HAT_Assets',
			'module' => 'HAT_Assets',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',

			
		),
		//B端下联端口或芯数
	'b_odf_ports' => array (
			'required' => false,
			'name' => 'b_odf_ports',
			'vname' => 'LBL_B_ODF_PORTS',
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
			'len' => '255',
			'size' => '20',

			
		),

		
	),
	'relationships' => array (),
	'optimistic_locking' => true,
	'unified_search' => true,

	
);
if (!class_exists('VardefManager')) {
	require_once ('include/SugarObjects/VardefManager.php');
}
VardefManager :: createVardef('HIT_ODF_REL', 'HIT_ODF_REL', array (
	'basic',
	'assignable',
	'security_groups'
));