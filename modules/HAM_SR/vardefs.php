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

$dictionary['HAM_SR'] = array(
	'table'=>'ham_sr',
	'audited'=>false,
  'inline_edit'=>false,
  'duplicate_merge'=>false,
  'fields'=>array (
    'ham_maint_sites_id' => 
    array (
      'required' => false,
      'name' => 'ham_maint_sites_id',
      'vname' => 'LBL_SITE_HAM_MAINT_SITES_ID',
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
    'site' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'site',
      'vname' => 'LBL_SITE',
      'type' => 'relate',
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
      'id_name' => 'ham_maint_sites_id',
      'ext2' => 'HAM_Maint_Sites',
      'module' => 'HAM_Maint_Sites',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'worklog' => 
    array (
      'required' => false,
      'name' => 'worklog',
      'vname' => 'LBL_WORKLOG',
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
    'location_extra_desc' => 
    array (
      'required' => false,
      'name' => 'location_extra_desc',
      'vname' => 'LBL_LOCATION_EXTRA_DESC',
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
    'hat_event_type_id' => 
      array (
            'required' => false,
            'name' => 'hat_event_type_id',
            'vname' => 'LBL_EVENT_TYPE_ID',
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
      'event_type' => 
      array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'event_type',
            'vname' => 'LBL_EVENT_TYPE',
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
            'id_name' => 'hat_event_type_id',
            'ext2' => 'HAT_EventType',
            'module' => 'HAT_EventType',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),
    'ham_priority_id' => 
    array (
      'required' => false,
      'name' => 'ham_priority_id',
      'vname' => 'LBL_PRIORITY_HAM_PRIORITY_ID',
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
    'priority' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'priority',
      'vname' => 'LBL_PRIORITY',
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
      'id_name' => 'ham_priority_id',
      'ext2' => 'HAM_Priority',
      'module' => 'HAM_Priority',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'sr_number' => 
    array (
      'required' => false,
      'name' => 'sr_number',
      'vname' => 'LBL_SR_NUMBER',
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
    'contact_by' => 
    array (
      'required' => false,
      'name' => 'contact_by',
      'vname' => 'LBL_CONTACT_BY',
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
      'options' => 'ahm_contact_by_list',
      'studio' => 'visible',
      'dependency' => false,
      ),
    'owned_by_id' => 
    array (
      'required' => false,
      'name' => 'owned_by_id',
      'vname' => 'LBL_OWNED_BY_ID',
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
    'owned_by' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'owned_by',
      'vname' => 'LBL_OWNED_BY',
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
      'id_name' => 'owned_by_id',
      'ext2' => 'Contacts',
      'module' => 'Contacts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'closed_by_id' => 
    array (
      'required' => false,
      'name' => 'closed_by_id',
      'vname' => 'LBL_REPORTER_CONTACT_ID',
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
    'closed_by' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'closed_by',
      'vname' => 'LBL_CLOSED_BY',
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
      'id_name' => 'closed_by_id',
      'ext2' => 'Contacts',
      'module' => 'Contacts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'contact_id' => 
    array (
      'required' => false,
      'name' => 'contact_id',
      'vname' => 'LBL_REPORTER_CONTACT_ID',
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
    'reporter' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'reporter',
      'vname' => 'LBL_REPORTER',
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
      'id_name' => 'contact_id',
      'ext2' => 'Contacts',
      'module' => 'Contacts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'work_phone' => 
    array (
      'required' => false,
      'name' => 'work_phone',
      'vname' => 'LBL_WORK_PHONE',
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
    'mobile' => 
    array (
      'required' => false,
      'name' => 'mobile',
      'vname' => 'LBL_MOBILE',
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
    'email' => 
    array (
      'required' => false,
      'name' => 'email',
      'vname' => 'LBL_EMAIL',
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
    'contact_notes' => 
    array (
      'required' => false,
      'name' => 'contact_notes',
      'vname' => 'LBL_CONTACT_NOTES',
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
    'owned_org_id' => 
    array (
      'required' => false,
      'name' => 'owned_org_id',
      'vname' => 'LBL_OWNED_ORG_ID',
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
    'owned_org' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'owned_org',
      'vname' => 'LBL_OWNED_ORG',
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
      'id_name' => 'owned_org_id',
      'ext2' => 'Accounts',
      'module' => 'Accounts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
     'account_id' => 
    array (
      'required' => false,
      'name' => 'account_id',
      'vname' => 'LBL_REPORTER_ORG_ACCOUNT_ID',
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
    'reporter_org' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'reporter_org',
      'vname' => 'LBL_REPORTER_ORG',
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
      'id_name' => 'account_id',
      'ext2' => 'Accounts',
      'module' => 'Accounts',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'closed_date' => 
    array (
      'required' => false,
      'name' => 'closed_date',
      'vname' => 'LBL_CLOSED_DATE',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'no_default' => true,
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
    'reported_date' => 
    array (
      'required' => true,
      'name' => 'reported_date',
      'vname' => 'LBL_REPORTED_DATE',
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
      'display_default' => 'now&12:00am',
      ),
    'sr_status' => 
    array (
      'required' => true,
      'name' => 'sr_status',
      'vname' => 'LBL_SR_STATUS',
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
      'options' => 'ham_sr_status_list',
      'studio' => 'visible',
      'dependency' => false,
      ),
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
    'hat_assets_id' => 
    array (
      'required' => false,
      'name' => 'hat_assets_id',
      'vname' => 'LBL_ASSET_ID',
      'type' => 'id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'inline_edit' => false,
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
      'audited' => false,
      'inline_edit' => false,
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
        'source' => 'non-db', //显示当前资产的说明
        'dbType' => 'non-db', 
        'name' => 'asset_desc',
        'vname' => 'LBL_ASSET_DESC',
        'rname' => 'asset_desc',
        'type' => 'relate',
        'default'=>'',
        'reportable' => true,
        'id_name' => 'hat_assets_id',
        'studio' => 'visible',
        'module' => 'HAT_Assets',
        'link'=>'ham_sr_hat_assets',

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
    'location_map_enabled' =>
    array (
        'source' => 'non-db', //显示当前地点的说明
        'name' => 'location_map_enabled',
        'vname' => 'LBL_LOCATION_MAP_ENABLED',
        'type' => 'bool',
        'default'=>'',
        'reportable' => true,
        'studio' => 'visible'
        ),
    'map_type' => 
    array (
      'required' => false,
      'name' => 'map_type',
      'vname' => 'LBL_MAP_TYPE',
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
      'options' => 'cux_map_type_list',
      ),
    'map_lat' => 
    array (
      'required' => false,
      'name' => 'map_lat',
      'vname' => 'LBL_MAP_LAT',
      'type' => 'float',
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
      //'default' => '0.00000000',
      'len' => '11',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => '8',
      ),
    'map_lng' => 
    array (
      'required' => false,
      'name' => 'map_lng',
      'vname' => 'LBL_MAP_LNG',
      'type' => 'float',
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
      //'default' => '0.00000000',
      'len' => '11',
      'size' => '20',
      'enable_range_search' => false,
      'precision' => '8',
      ),
    'map_zoom' => 
    array (
      'required' => false,
      'name' => 'map_zoom',
      'vname' => 'LBL_MAPS_ZOOM',
      'type' => 'int',
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
    'map_enabled' => 
    array (
      'required' => false,
      'name' => 'map_enabled',
      'vname' => 'LBL_MAPS_ENABLED',
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
    'map_address' => 
    array (
      'required' => false,
      'name' => 'map_address',
      'vname' => 'LBL_MAPS_ADDRESS',
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
    'map_search_area' => 
    array (
      'name' => 'map_search_area',
      'vname' => 'LBL_MAP_SEARCH_AREA',
      'source' => 'non-db',
      'type' => 'varchar',
      'massupdate' => 0,
      ),
    'map_display_area' =>
    array (
        'source' => 'non-db', //Location
        'name' => 'map_display_area',
        'vname' => 'LBL_MAP_DISPLAY_AREA',
        'type' => 'varchar',
        'reportable' => true,
        'studio' => 'visible'
        ),
'ham_wo_id' => 
    array (
      'required' => false,
      'name' => 'ham_wo_id',
      'vname' => 'LBL_HAM_WO_ID',
      'type' => 'id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'inline_edit' => false,
      'reportable' => false,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 36,
      'size' => '20',
      ),
    
    'ham_wo_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'ham_wo_name',
      'vname' => 'LBL_WO',
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
      'id_name' => 'ham_wo_id',
      'ext2' => 'HAM_WO',
      'module' => 'HAM_WO',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'ham_wo_number' =>
    array (
        'source' => 'non-db', //WO
        'dbType' => 'non-db', //WO
        'id_name' => 'ham_wo_id',
        'name' => 'ham_wo_number',
        'vname' => 'LBL_WO_NUM',
        'rname' => 'wo_number',
        'type' => 'relate',
        'reportable' => true,
        'studio' => 'visible',
        'module' => 'HAM_WO',
        'link'=>'ham_sr_ham_wo',
        ),
    'ham_wo_status' =>
    array (
        'source' => 'non-db', //WO
        'dbType' => 'non-db', //WO
        'id_name' => 'ham_wo_id',
        'name' => 'ham_wo_status',
        'vname' => 'LBL_WO_STATUS',
        'rname' => 'wo_status',
        'type' => 'relate',
        'module' => 'HAM_WO',
        'link'=>'ham_sr_ham_wo',
        'reportable' => true,
        'studio' => 'visible'
        ),
    ),
'relationships'=>array (
    'ham_sr_ham_wo' => 
    array (
      'lhs_module' => 'HAM_WO',
      'lhs_table' => 'ham_wo',
      'lhs_key' => 'id',
      'rhs_module' => 'HAM_SR',
      'rhs_table' => 'ham_sr',
      'rhs_key' => 'ham_wo_id',
      'relationship_type' => 'one-to-many',
    ),
/*    'ham_sr_hat_assets' => 
    array (
      'lhs_module' => 'HAT_Assets',
      'lhs_table' => 'hat_assets',
      'lhs_key' => 'id',
      'rhs_module' => 'HAM_SR',
      'rhs_table' => 'ham_sr',
      'rhs_key' => 'asset_id',
      'relationship_type' => 'one-to-many',
    ),*/
/*    'ham_sr_hat_asset_locations' => 
    array (
      'lhs_module' => 'HAT_Asset_Locations',
      'lhs_table' => 'hat_asset_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'HAM_SR',
      'rhs_table' => 'ham_sr',
      'rhs_key' => 'location_id',
      'relationship_type' => 'one-to-many',
    ),*/



  ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAM_SR','HAM_SR', array('basic','assignable','security_groups'));