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

$dictionary['HIM_Project_Requests'] = array(
	'table'=>'him_project_requests',
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
  'organization_id' => 
  array (
    'required' => false,
    'name' => 'organization_id',
    'vname' => 'LBL_ORGANIZATION_ID',
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
  'organization' => 
  array (
    'required' => true,
    'source' => 'non-db',
    'name' => 'organization',
    'vname' => 'LBL_ORGANIZATION',
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
    'id_name' => 'organization_id',
    'ext2' => 'Accounts',
    'module' => 'Accounts',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'request_organization_id' => 
  array (
    'required' => false,
    'name' => 'request_organization_id',
    'vname' => 'LBL_REQUEST_ORGANIZATION_ID',
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
  'request_organization' => 
  array (
    'required' => true,
    'source' => 'non-db',
    'name' => 'request_organization',
    'vname' => 'LBL_REQUEST_ORGANIZATION',
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
    'id_name' => 'request_organization_id',
    'ext2' => 'Accounts',
    'module' => 'Accounts',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'im_categories_id' => 
  array (
    'required' => false,
    'name' => 'im_categories_id',
    'vname' => 'LBL_IM_CATEGORIES_ID',
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
  'im_categories' => 
  array (
    'required' => true,
    'source' => 'non-db',
    'name' => 'im_categories',
    'vname' => 'LBL_IM_CATEGORIES',
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
    'id_name' => 'im_categories_id',
    'ext2' => 'HIM_IM_Categories',
    'module' => 'HIM_IM_Categories',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'programs_id' => 
  array (
    'required' => false,
    'name' => 'programs_id',
    'vname' => 'LBL_IM_CATEGORIES_ID',
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
  'programs' => 
  array (
    'required' => true,
    'source' => 'non-db',
    'name' => 'programs',
    'vname' => 'LBL_PROGRAMS',
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
    'id_name' => 'programs_id',
    'ext2' => 'HIM_Programs',
    'module' => 'HIM_Programs',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'him_project_tasks_link' => 
  array (
    'name' => 'him_project_tasks_link',
    'type' => 'link',
    'relationship' => 'him_project_tasks',
    'link_type' => 'many',
    'module' => 'HIM_Project_Tasks',
    'bean_name' => 'HIM_Project_Tasks',
    'source' => 'non-db',
  ),
  'him_project_budgets_link' => 
  array (
    'name' => 'him_project_budgets_link',
    'type' => 'link',
    'relationship' => 'him_project_budgets',
    'link_type' => 'many',
    'module' => 'HIM_Project_Budgets',
    'bean_name' => 'HIM_Project_Budgets',
    'source' => 'non-db',
  ),
),
	'relationships'=>array (
  'him_project_tasks' => 
  array (
    'lhs_module' => 'HIM_Project_Requests',
    'lhs_table' => 'him_project_requests',
    'lhs_key' => 'id',
    'rhs_module' => 'HIM_Project_Tasks',
    'rhs_table' => 'him_project_tasks',
    'rhs_key' => 'project_request_id',
    'relationship_type' => 'one-to-many',
  ),
  'him_project_budgets' => 
  array (
    'lhs_module' => 'HIM_Project_Requests',
    'lhs_table' => 'him_project_requests',
    'lhs_key' => 'id',
    'rhs_module' => 'HIM_Project_Budgets',
    'rhs_table' => 'him_project_budgets',
    'rhs_key' => 'project_request_id',
    'relationship_type' => 'one-to-many',
  ),
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HIM_Project_Requests','HIM_Project_Requests', array('basic','assignable','security_groups'));