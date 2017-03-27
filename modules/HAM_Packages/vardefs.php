<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
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
 */

$dictionary['HAM_Packages'] = array(
    'table' => 'ham_packages',
    'audited' => true,
    'inline_edit' => true,
    'duplicate_merge' => true,
    'fields' => array (


'pm_time_interval' => 
  array (
    'required' => false,
    'name' => 'pm_time_interval',
    'vname' => 'LBL_TIME_INTERVAL',
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
    'precision' => '8',

  ),
        'pm_uom_id' =>
        array (
            'required' => false,
            'name' => 'pm_uom_id',
            'vname' => 'LBL_UOM_ID',
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
        'uom' =>
        array (
            'required' => true,
            'source' => 'non-db',
            'name' => 'uom',
            'vname' => 'LBL_UOM',
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
            'id_name' => 'pm_uom_id',
            'ext2' => 'HAA_UOM',
            'module' => 'HAA_UOM',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),

    'ham_package_rules_link' => array (
      'name' => 'ham_package_rules_link',
      'type' => 'link',
      'relationship' => 'ham_package_rules',
      'vname' => 'LBL_HAM_PACKAGE_RULES_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_Package_Rules',
      'bean_name' => 'HAM_Package_Rules',
      'source' => 'non-db',
    ),
),
    'relationships' => array (

    	'ham_package_rules' => array (
		    'lhs_module' => 'HAM_Packages',
		    'lhs_table' => 'ham_packages',
		    'lhs_key' => 'id',
		    'rhs_module' => 'HAM_Package_Rules',
		    'rhs_table' => 'ham_package_rules',
		    'rhs_key' => 'ham_packages_id',
		    'relationship_type' => 'one-to-many',
	    ),
),
    'optimistic_locking' => true,
    'unified_search' => true,
);
if (!class_exists('VardefManager')) {
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAM_Packages', 'HAM_Packages', array('basic','assignable','security_groups'));