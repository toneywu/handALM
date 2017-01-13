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

$dictionary['HAOR_Parameters'] = array(
	'table'=>'haor_parameters',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
        "aor_report" => array (
            'name' => 'aor_report',
            'type' => 'link',
            'relationship' => 'haor_parameters_aor_reports',
            'module'=>'AOR_Reports',
            'bean_name'=>'AOR_Report',
            'link_type'=>'one',
            'source' => 'non-db',
            'vname' => 'LBL_AOR_REPORT',
            'side' => 'left',
            'id_name' => 'aor_report_id',
            ),
        "aor_report_name" => array (
            'name' => 'aor_report_name',
            'type' => 'relate',
            'source' => 'non-db',
            'vname' => 'LBL_AOR_REPORT_NAME',
            'save' => true,
            'id_name' => 'aor_report_id', 
            'link' => 'haor_parameters_aor_reports',
            'table' => 'aor_reports',
            'module' => 'AOR_Report',
            'rname' => 'name',
            ),
        "aor_report_id" => array (
            'name' => 'aor_report_id',
            'type' => 'id',
            'reportable' => false,
            'vname' => 'LBL_AOR_REPORT_ID',
            ),
        'name' => 
        array (
            'name' => 'name',
            'vname' => 'LBL_NAME',
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
            'duplicate_merge' => 'disabled',
            'merge_filter' => 'disabled',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'inline_edit' => true,
            'reportable' => true,
            'size' => '20',
            ),
        'type' =>
        array (
            'required' => false,
            'name' => 'type',
            'vname' => 'LBL_PARAMETER_TYPE',
            'type' => 'enum',
            'massupdate' => 0,
            'len' => 100,
            'size' => '20',
            'options' => 'aor_parameter_type_list',
            ),
        "value_id" => array (
            'required' => false,
            'name' => 'value_id',
            'type' => 'varchar',
            'vname' => 'LBL_PARAMETER_VALUE_ID',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'reportable' => true,
            'len' => '40',
            ),
        'value' => 
        array (
            'required' => false,
            'name' => 'value',
            'vname' => 'LBL_PARAMETER_VALUE',
            'type' => 'varchar',
            'massupdate' => 0,
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
            ),
        'source_module' => 
        array (
            'required' => false,
            'name' => 'source_module',
            'vname' => 'LBL_SOURCE_MODULE',
            'type' => 'varchar',
            'massupdate' => 0,
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
            ),
        'list_options_name' =>
        array(
            'required' => false,
            'name' => 'list_options_name',
            'vname' => 'LBL_LIST_NAME',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'reportable' => true,
            'len' => '40',
            ),
        'sql_statement' =>
        array(
            'required' => false,
            'name' => 'sql_statement',
            'vname' => 'LBL_SQL_STATEMENT',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'reportable' => true,
            'len' => '2000',
            ),
        ),
'relationships'=>array (
    "haor_parameters_aor_reports" => array (
        'lhs_module'=> 'AOR_Reports',
        'lhs_table'=> 'aor_reports',
        'lhs_key' => 'id',
        'rhs_module'=> 'HAOR_Parameters',
        'rhs_table'=> 'haor_parameters',
        'rhs_key' => 'aor_report_id',
        'relationship_type'=>'one-to-many',
        ),
    ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAOR_Parameters','HAOR_Parameters', array('basic','assignable','security_groups'));
