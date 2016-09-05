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

$dictionary['HIT_VLAN_LIST'] = array (
	'table' => 'hit_vlan_list',
	'audited' => true,
	'inline_edit' => true,
	'duplicate_merge' => true,
	'fields' => array (
		'ham_maint_sites_id' => array (
			'inline_edit' => 1,
			'required' => false,
			'name' => 'ham_maint_sites_id',
			'vname' => 'LBL_MAINT_SITE_HAM_MAINT_SITES_ID',
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
		),
		'maint_site' => array (
			'inline_edit' => '',
			'labelValue' => 'Maint Site',
			'required' => true,
			'source' => 'non-db',
			'name' => 'maint_site',
			'vname' => 'LBL_MAINT_SITE',
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
			'id_name' => 'ham_maint_sites_id',
			'ext2' => 'HAM_Maint_Sites',
			'module' => 'HAM_Maint_Sites',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
		),

		#资产
	'hat_assets_id' => array (
			'required' => false,
			'name' => 'hat_assets_id',
			'vname' => 'LBL_HAA_ASSET_NAME_HAT_ASSETS_ID',
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

		'haa_asset_name' => array (
			'required' => true,
			'source' => 'non-db',
			'name' => 'haa_asset_name',
			'vname' => 'LBL_HAA_ASSET_NAME',
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
			'id_name' => 'hat_assets_id',
			'ext2' => 'HAT_Assets',
			'module' => 'HAT_Assets',
			'rname' => 'name',
			'quicksearch' => 'enabled',
			'studio' => 'visible',
		),

		'vlan_type' => array (
			'required' => true,
			'name' => 'vlan_type',
			'vname' => 'LBL_VLAN_TYPE',
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
			'options' => 'link_list',
			'studio' => 'visible',
			'dependency' => false,	
		),

		'comment' => array (
			'required' => false,
			'name' => 'comment',
			'vname' => 'LBL_COMMENT',
			'type' => 'text',
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
VardefManager :: createVardef('HIT_VLAN_LIST', 'HIT_VLAN_LIST', array (
	'basic',
	'assignable',
	'security_groups'
));