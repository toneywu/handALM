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

$dictionary['HAT_Meters'] = array(
	'table'=>'hat_meters',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
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
      'meter_type_id' => 
      array (
        'required' => false,
        'name' => 'meter_type_id',
        'vname' => 'LBL_METER_TYPE_ID',
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
      'meter_type' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'meter_type',
        'vname' => 'LBL_METER_TYPE',
        'type' => 'relate',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'inline_edit' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '255',
        'size' => '20',
        'id_name' => 'meter_type_id',
        'ext2' => 'HAT_Meter_Types',
        'module' => 'HAT_Meter_Types',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'hat_asset_location_id' => 
      array (
        'required' => false,
        'name' => 'hat_asset_location_id',
        'vname' => 'LBL_ASSET_LOCATION_ID',
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
      'hat_asset_location' =>
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'hat_asset_location',
        'vname' => 'LBL_HAT_ASSET_LOCATION',
        'type' => 'relate',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'inline_edit' => true,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '255',
        'size' => '20',
        'id_name' => 'hat_asset_location_id',
        'ext2' => 'HAT_Asset_Locations',
        'module' => 'HAT_Asset_Locations',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'hat_assets_id' =>
      array (
        'required' => false,
        'name' => 'hat_assets_id',
        'vname' => 'LBL_ASSET_HAT_ASSETS_ID',
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
        'required' => false,
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
        'audited' => true,
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

  'latest_reading' => 
  array (
    'required' => true,
    'name' => 'latest_reading',
    'vname' => 'LBL_LATEST_READING',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'inline_edit' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
  ),
      'reading_date' => 
      array (
            'required' => false,
            'name' => 'reading_date',
            'vname' => 'LBL_READING_DATE',
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
            'display_default' => '',
            ),

    'meter_uom' =>
    array (
            'source' => 'non-db', 
            'name' => 'meter_uom',
            'vname' => 'LBL_METER_UOM',
            'type' => 'varchar',
            'reportable' => true,
            'studio' => 'visible'
            ),

      'hat_meters_hat_assets_link' =>
      array(
        'name' => 'hat_meters_hat_assets_link',
        'type' => 'link',
        'relationship' => 'hat_meters_hat_assets',
        'link_type' => 'many',
        'module' => 'HAT_Assets',
        'bean_name' => 'HAT_Assets',
        'source' => 'non-db',
        ),
      'hat_meters_hat_asset_locations_link' =>
      array(
        'name' => 'hat_meters_hat_asset_locations_link',
        'type' => 'link',
        'relationship' => 'hat_meters_hat_asset_locations',
        'link_type' => 'many',
        'module' => 'HAT_Asset_Locations',
        'bean_name' => 'HAT_Asset_Locations',
        'source' => 'non-db',
        ),
      'hat_meters_hat_meter_readings' =>
      array(
        'name' => 'hat_meters_hat_meter_readings',
        'type' => 'link',
        'relationship' => 'hat_meters_hat_meter_readings',
        'link_type' => 'many',
        'module' => 'HAT_Meter_Readings',
        'bean_name' => 'HAT_Meter_Readings',
        'source' => 'non-db',
        ),
      ),
'relationships'=>array (
    'hat_meters_hat_assets' => 
    array (
        'lhs_module' => 'HAT_Assets',
        'lhs_table' => 'hat_assets',
        'lhs_key' => 'id',
        'rhs_module' => 'HAT_Meters',
        'rhs_table' => 'hat_meters',
        'rhs_key' => 'hat_assets_id',
        'relationship_type' => 'one-to-many',
        ),
    'hat_meters_hat_asset_locations' => 
    array (
        'lhs_module' => 'HAT_Asset_Locations',
        'lhs_table' => 'hat_asset_locations',
        'lhs_key' => 'id',
        'rhs_module' => 'HAT_Meters',
        'rhs_table' => 'hat_meters',
        'rhs_key' => 'hat_asset_location_id',
        'relationship_type' => 'one-to-many',
        ),
    'hat_meters_hat_meter_readings' =>
    array (
      'lhs_module' => 'HAT_Meters',
      'lhs_table' => 'hat_meters',
      'lhs_key'   => 'id',
      'rhs_module' => 'HAT_Meter_Readings',
      'rhs_table' => 'hat_meter_readings',
      'rhs_key'   => 'meter_id',
      'relationship_type' => 'one-to-many',
      ),
    ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAT_Meters','HAT_Meters', array('basic','assignable','security_groups'));