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

$dictionary['HAT_Gird_Rules'] = array(
	'table'=>'hat_gird_rules',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
            'name' =>
                array (
                    'name' => 'name',
                    'vname' => 'GIRD_NAME',
                    'type' => 'name',
                    'link' => true,
                    'dbType' => 'varchar',
                    'len' => '255',
                    'unified_search' => false,
                    'full_text_search' =>
                        array (
                            'boost' => 3,
                        ),
                    'required' => true,
                    'importable' => 'required',
                    'duplicate_merge' => 'enabled',
                    'merge_filter' => 'disabled',
                    'massupdate' => 0,
                    'no_default' => false,
                    'comments' => '',
                    'help' => '',
                    'duplicate_merge_dom_value' => '1',
                    'audited' => false,
                    'inline_edit' => false,
                    'reportable' => true,
                    'size' => '30',
                ),
            'frameworks' =>
                array (
                    'inline_edit' => '',
                    'required' => true,
                    'source' => 'non-db',
                    'name' => 'frameworks',
                    'vname' => 'FRAMEWORKS',
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
                    'id_name' => 'hat_frameworks_id',
                    'ext2' => 'HAT_Frameworks',
                    'module' => 'HAT_Frameworks',
                    'rname' => 'name',
                    'quicksearch' => 'enabled',
                    'studio' => 'visible',
                    'id' => 'hat_frameworks_id',
                ),
            'code_asset_location_type' =>
                array (
                    'inline_edit' => '',
                    'required' => true,
                    'source' => 'non-db',
                    'name' => 'code_asset_location_type',
                    'vname' => 'LBL_ASSET_LOCATION_TYPE',
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
                    'id_name' => 'code_asset_location_type_id',
                    'ext2' => 'HAA_Codes',
                    'module' => 'HAA_Codes',
                    'rname' => 'name',
                    'quicksearch' => 'enabled',
                    'studio' => 'visible',
                    'id' => 'code_asset_location_type_id',
                ),
            'line_layout' =>
                array (
                    'required' => true,
                    'default' => "Vetical",
                    'name' => 'line_layout',
                    'vname' => 'LBL_LINE_LAYOUT',
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
                    'options' => 'hat_gird_line_layout_list',
                ),
            'line_order' =>
                array (
                    'required' => false,
                    'default' => "ASC",
                    'name' => 'line_order',
                    'vname' => 'LBL_LINE_ORDER',
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
                    'options' => 'haa_order_list',
                ),
            'line_point_order' =>
                array (
                    'required' => false,
                    'default' => "ASC",
                    'name' => 'line_point_order',
                    'vname' => 'LBL_LINE_POINT_ORDER',
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
                    'options' => 'haa_order_list',
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
VardefManager::createVardef('HAT_Gird_Rules','HAT_Gird_Rules', array('basic','assignable','security_groups'));
