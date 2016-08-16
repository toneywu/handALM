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

$dictionary['HAT_Linear_Elements'] = array(
	'table'=>'hat_linear_elements',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
      'hat_asset_locations_id' => 
      array (
            'required' => false,
            'name' => 'hat_asset_locations_id',
            'vname' => 'LBL_LOCATION_HAT_ASSET_LOCATIONS_ID',
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
      'location' => 
      array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'location',
            'vname' => 'LBL_LOCATION',
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
            'id_name' => 'hat_asset_locations_id',
            'ext2' => 'HAT_Asset_Locations',
            'module' => 'HAT_Asset_Locations',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),
      'parent_asset_id' => 
      array (
            'required' => false,
            'name' => 'parent_asset_id',
            'vname' => 'LBL_PARENT_ASSET_ID',
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
      'parent_asset' => 
      array (
            'required' => true,
            'source' => 'non-db',
            'name' => 'parent_asset',
            'vname' => 'LBL_PARENT_ASSET',
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
            'id_name' => 'parent_asset_id',
            'ext2' => 'HAT_Assets',
            'module' => 'HAT_Assets',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),
      'element_asset_id' => 
      array (
            'required' => false,
            'name' => 'element_asset_id',
            'vname' => 'LBL_ELEMENT_ASSET_ID',
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
    
    'linear_distance' =>
    array (
            'source' => 'non-db', //Location
            'name' => 'linear_distance',
            'vname' => 'LBL_LINEAR_DISTANCE',
            'type' => 'varchar',
            'reportable' => true,
            'studio' => 'visible'
            ),      
      'element_asset' => 
      array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'element_asset',
            'vname' => 'LBL_ELEMENT_ASSET',
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
            'id_name' => 'element_asset_id',
            'ext2' => 'HAT_Assets',
            'module' => 'HAT_Assets',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),
    'linear_start_measure' =>
    array(
      'required' => false,
      'name' => 'linear_start_measure',
      'vname' => 'LBL_LINEAR_START',
      'type' => 'double',
      'len' => '26,6',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => true,
      'enable_range_search' => true,
      'options' => 'numeric_range_search_dom',
      ),
    'linear_end_measure' =>
    array(
      'required' => false,
      'name' => 'linear_end_measure',
      'vname' => 'LBL_LINEAR_END',
      'type' => 'currency',
      'len' => '26,6',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => true,
      'enable_range_search' => true,
      'options' => 'numeric_range_search_dom',
      ),
    'linear_element_details' =>
    array(
      'required' => false,
      'name' => 'linear_element_details',
      'vname' => 'LBL_LINEAR_ELEMENT_DETAILS',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => true,
      'enable_range_search' => true,
      'options' => 'numeric_range_search_dom',
      ),

      'element_asset_desc' =>
      array (
        'source' => 'non-db', //显示当前资产的说明
        'name' => 'element_asset_desc',
        'vname' => 'LBL_ASSET_DESC',
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
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAT_Linear_Elements','HAT_Linear_Elements', array('basic','assignable','security_groups'));