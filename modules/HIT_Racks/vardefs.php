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

$dictionary['HIT_Racks'] = array(
	'table'=>'hit_racks',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
        'hat_assets_id' => 
        array (
            'required' => false,
            'name' => 'hat_assets_id',
            'vname' => 'LBL_HAT_ASSETS_ID',
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
        'asset' => 
        array (
            'required' => true,
            'source' => 'non-db',
            'name' => 'asset',
            'vname' => 'LBL_ASSET',
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
        'asset_desc' => 
        array (
            'name' => 'asset_desc',
            'type' => 'vchar',
            'vname' => 'LBL_ASSET_DESC',
            'module' => 'HAT_Assets',
            'source' => 'non-db',
            'dbType' => 'non-db',
            'studio' => 'visible',
            ),
        'occupation' => 
        array (
            'name' => 'occupation',
            'type' => 'vchar',
            'vname' => 'LBL_OCCUPATION',
            'source' => 'non-db',
            'dbType' => 'non-db',
            'studio' => 'visible',
            ),
        'asset_status' => 
        array (
            'name' => 'asset_status',
            'type' => 'vchar',
            'vname' => 'LBL_ASSET_STATUS',
            'module' => 'HAT_Assets',
            'source' => 'non-db',
            'dbType' => 'non-db',
            'studio' => 'visible',
            ),
        'hat_assets_accounts_name' => 
        array (
          'name' => 'hat_assets_accounts_name',
          'type' => 'relate',
          'source' => 'non-db',
          'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          'save' => true,
          'id_name' => 'hat_assets_accounts_id',
          //'link' => 'hat_assets_accounts',
          //'table' => 'accounts',
          'module' => 'Accounts',
          //'rname' => 'name',
          ),
        'hat_assets_accounts_id' => 
        array (
          'name' => 'hat_assets_accounts_id',
          'type' => 'id',
          'source' => 'non-db',
          'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          'save' => true,
          //'link' => 'hat_assets_accounts',
          //'table' => 'accounts',
          'module' => 'Accounts',
          //'rname' => 'name',
          ),
        'hat_asset_locations' => 
        array (
          'name' => 'hat_asset_locations',
          'type' => 'relate',
          'source' => 'non-db',
          'vname' => 'LBL_HAT_ASSET_LOCATIONS',
          'save' => true,
          'id_name' => 'hat_asset_locations_id',
          //'link' => 'hat_assets_accounts',
          //'table' => 'accounts',
          'module' => 'HAT_Asset_Locations',
          //'rname' => 'name',
          ),
        'hat_asset_locations_id' => 
        array (
          'name' => 'hat_asset_locations_id',
          'type' => 'id',
          'source' => 'non-db',
          'vname' => 'HAT_ASSET_LOCATIONS_ID',
          'save' => true,
          //'link' => 'hat_assets_accounts',
          //'table' => 'accounts',
          'module' => 'HAT_Asset_Locations',
          //'rname' => 'name',
          ),      
        'height' => 
        array (
            'required' => true,
            'name' => 'height',
            'vname' => 'LBL_HEIGHT',
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
        'depth' => 
        array (
            'required' => false,
            'name' => 'depth',
            'vname' => 'LBL_DEPTH',
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
        'numbering_rule' => 
        array (
            'required' => true,
            'name' => 'numbering_rule',
            'vname' => 'LBL_NUMBERING_RULE',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => 'BOTTOM',
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
            'options' => 'hit_racks_numbering_list',
            'studio' => 'visible',
            'dependency' => false,
            ),
        'position_display_area' =>
        array (
            'name' => 'position_display_area',
            'vname' => 'LBL_POSITION_DISPLAY_AREA',
            'source' => 'non-db',
            'type' => 'varchar',
            'massupdate' => 0,
            ),
        'asset_link' =>
        array(
            'name' => 'asset_link',
            'type' => 'link',
            'relationship' => 'hit_racks_hat_assets',
            'vname' => 'LBL_CURRENT_ASSET_SUBPANEL_TITLE',
            'link_type' => 'many',
            'module' => 'HAT_Assets',
            'bean_name' => 'HAT_Assets',
            'source' => 'non-db',
            ),
        'rack_allocation_link' =>
        array(
            'name' => 'asset_allocation_link',
            'type' => 'link',
            'relationship' => 'hit_rack_allocations_hit_racks',
            'vname' => 'LBL_CURRENT_ASSET_ALLOCATION_SUBPANEL_TITLE',
            'link_type' => 'many',
            'module' => 'HAT_Assets',
            'bean_name' => 'HAT_Assets',
            'source' => 'non-db',
            ),

        ),
'relationships'=>array (
 'hit_racks_hat_assets' => 
 array (
  'lhs_module' => 'HIT_Racks',
  'lhs_table' => 'hit_racks',
  'lhs_key'   => 'hat_assets_id',
  'rhs_module' => 'HAT_Assets',
  'rhs_table' => 'hat_assets',
  'rhs_key'   => 'id',
  'relationship_type' => 'one-to-one',
  ),
 'hit_rack_allocations_hit_racks' => 
 array (
  'lhs_module' => 'HIT_Racks',
  'lhs_table' => 'hit_racks',
  'lhs_key'   => 'id',
  'rhs_module' => 'HIT_Rack_Allocations',
  'rhs_table' => 'hit_rack_allocations',
  'rhs_key'   => 'hit_racks_id',
  'relationship_type' => 'one-to-many',
  ),
 ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HIT_Racks','HIT_Racks', array('basic','assignable','security_groups'));