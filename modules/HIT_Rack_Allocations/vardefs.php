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

$dictionary['HIT_Rack_Allocations'] = array(
	'table'=>'hit_rack_allocations',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
      'hit_racks_id' => 
      array (
        'required' => false,
        'name' => 'hit_racks_id',
        'vname' => 'LBL_HIT_RACKS_ID',
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
      'rack' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'rack',
        'vname' => 'LBL_RACK',
        'type' => 'relate',
        'massupdate' => 0,
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
        'len' => '255',
        'size' => '20',
        'id_name' => 'hit_racks_id',
        'ext2' => 'HIT_Racks',
        'module' => 'HIT_Racks',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
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
        'id_name' => 'hat_assets_id',
        'type' => 'relate',
        'rname' => 'asset_desc',
        'link'=>'asset_link',
        'vname' => 'LBL_ASSET_DESC',
        'module' => 'HAT_Assets',
        'source' => 'non-db',
        'dbType' => 'non-db',
        'studio' => 'visible',
        ),
      'asset_status' => 
      array (
        'name' => 'asset_status',
        'id_name' => 'hat_assets_id',
        'type' => 'relate',
        'rname' => 'asset_status',
        'link'=>'asset_link',
        'vname' => 'LBL_ASSET_STATUS',
        'module' => 'HAT_Assets',
        'source' => 'non-db',
        'dbType' => 'non-db',
        'studio' => 'visible',
        ),

      'using_org_id' => 
      array (
        'required' => false,
        'name' => 'using_org_id',
        'vname' => 'LBL_USING_ORG_ID',
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
      'using_org' =>
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'using_org',
        'vname' => 'LBL_USING_ORG',
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
        'id_name' => 'using_org_id',
        'ext2' => 'Accounts',
        'module' => 'Accounts',
        'rname' => 'name',
        'quicksearch' => 'enabled',
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
          'module' => 'Accounts',
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
      'rack_pos_top' => 
      array (
        'required' => true,
        'name' => 'rack_pos_top',
        'vname' => 'LBL_RACK_POS_TOP',
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
      'rack_pos_depth' => 
      array (
        'required' => false,
        'name' => 'rack_pos_depth',
        'vname' => 'LBL_RACK_POS_DEPTH',
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
        'options' => 'hit_rack_pos_depth_list',
        'studio' => 'visible',
        'dependency' => false,
        ),
    'sync_parent_enabled' => 
    array (
      'required' => false,
      'name' => 'sync_parent_enabled',
      'vname' => 'LBL_SYNC_PARENT_ENABLED',
      'type' => 'bool',
      'massupdate' => 0,
      'default' => '1',
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
      ),
    'placeholder' => 
    array (
      'required' => false,
      'name' => 'placeholder',
      'vname' => 'LBL_PLACEHOLDER',
      'type' => 'bool',
      'massupdate' => 0,
      'default' => '0',
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
      ),
    'allocation_status' => 
    array (
      'required' => false,
      'name' => 'allocation_status',
      'vname' => 'LBL_ALLOCATION_STATUS',
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
      ),
      'asset_link' =>
      array(
        'name' => 'asset_link',
        'type' => 'link',
        'relationship' => 'hit_rack_allocations_hat_assets',
        'vname' => 'LBL_ASSET_LINK',
        'link_type' => 'many',
        'module' => 'HAT_Assets',
        'bean_name' => 'HAT_Assets',
        'source' => 'non-db',
        ),

      ),


'indices'=>array (
    array (
      'name' => 'hit_rack_allocationspk',
      'type' => 'primary',
      'fields' =>
      array (
        0 => 'id',
      ),
    ),
    array (
      'name' => 'idx_hit_rack_allocations_rackid',
      'type' => 'index',
      'fields' =>
      array (
        0 =>'hit_racks_id',
        2 => 'deleted',
      ),
    ),
    array (
      'name' => 'idx_hit_rack_allocations_assetid',
      'type' => 'index',
      'fields' =>
      array (
        0 => 'hat_assets_id',
        2 => 'deleted',
      ),
    ),
),

'relationships'=>array (
 'hit_rack_allocations_hat_assets' => 
 array (
  'lhs_module' => 'HIT_Rack_Allocations',
  'lhs_table' => 'hit_rack_allocations',
  'lhs_key'   => 'hat_assets_id',
  'rhs_module' => 'HAT_Assets',
  'rhs_table' => 'hat_assets',
  'rhs_key'   => 'id',
  'relationship_type' => 'many-to-one',
  ),
 ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HIT_Rack_Allocations','HIT_Rack_Allocations', array('basic','assignable','security_groups'));