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

$dictionary['HAOS_Payments'] = array(
    'table' => 'haos_payments',
    'audited' => true,
    'inline_edit' => true,
    'duplicate_merge' => true,
    'fields' => array (
      'haa_frameworks_id_c' => 
      array (
        'required' => false,
        'name' => 'haa_frameworks_id_c',
        'vname' => 'LBL_FRAMEWORKS_HAA_FRAMEWORKS_ID',
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
      'frameworks' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'frameworks',
        'vname' => 'LBL_FRAMEWORKS',
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
        'id_name' => 'haa_frameworks_id_c',
        'ext2' => 'HAA_Frameworks',
        'module' => 'HAA_Frameworks',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
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
      'payment_date' => 
      array (
        'required' => true,
        'name' => 'payment_date',
        'vname' => 'LBL_PAYMENT_DATE',
        'type' => 'date',
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
        ),
      'haa_periods_id_c' => 
      array (
        'required' => false,
        'name' => 'haa_periods_id_c',
        'vname' => 'LBL_PERIOD_NAME_HAA_PERIODS_ID',
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
      'period_name' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'period_name',
        'vname' => 'LBL_PERIOD_NAME',
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
        'id_name' => 'haa_periods_id_c',
        'ext2' => 'HAA_Periods',
        'module' => 'HAA_Periods',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'currency_id' => 
      array (
        'required' => true,
        'name' => 'currency_id',
        'vname' => 'LBL_CURRENCY_ID',
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
        'function' =>
        array(
            'name' => 'getCurrencyDropDown',
            'returns' => 'html',
            ),
        ),
      'payment_amount' => 
      array (
        'required' => true,
        'name' => 'payment_amount',
        'vname' => 'LBL_PAYMENT_AMOUNT',
        'type' => 'currency',
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
        'len' => 26,
        'size' => '20',
        'enable_range_search' => false,
        'precision' => 6,
        ),
      'payment_amount_usdollar' => 
      array (
        'required' => false,
        'name' => 'payment_amount_usdollar',
        'vname' => 'LBL_PAYMENT_AMOUNT_USDOLLAR',
        'type' => 'currency',
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
        'len' => 26,
        'size' => '20',
        'enable_range_search' => false,
        'precision' => 6,
        ),
      'payment_method_type' => 
      array (
        'required' => false,
        'name' => 'payment_method_type',
        'vname' => 'LBL_PAYMENT_METHOD_TYPE',
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
        'options' => 'haos_payment_type',
        'studio' => 'visible',
        'dependency' => false,
        ),
      'contact_id_c' => 
      array (
        'required' => false,
        'name' => 'contact_id_c',
        'vname' => 'LBL_RESPONSIBLE_PERSON_CONTACT_ID',
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
      'responsible_person' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'responsible_person',
        'vname' => 'LBL_RESPONSIBLE_PERSON',
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
        'id_name' => 'contact_id_c',
        'ext2' => 'Contacts',
        'module' => 'Contacts',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'payment_status' => 
      array (
        'required' => true,
        'name' => 'payment_status',
        'vname' => 'LBL_PAYMENT_STATUS',
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
        'options' => 'haos_payment_status',
        'studio' => 'visible',
        'dependency' => false,
        ),
      'description' => 
      array (
        'name' => 'description',
        'vname' => 'LBL_DESCRIPTION',
        'type' => 'text',
        'comment' => 'Full text of the note',
        'rows' => '6',
        'cols' => '80',
        'required' => false,
        'massupdate' => 0,
        'no_default' => false,
        'comments' => 'Full text of the note',
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
        'studio' => 'visible',
        ),
      'account_id_c' => 
      array (
        'required' => false,
        'name' => 'account_id_c',
        'vname' => 'LBL_ACCOUNT_NAME_ACCOUNT_ID',
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
      'cust_account_name' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'cust_account_name',
        'vname' => 'LBL_CUST_ACCOUNT_NAME',
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
        'id_name' => 'account_id_c',
        'ext2' => 'Accounts',
        'module' => 'Accounts',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'contact_id1_c' => 
      array (
        'required' => false,
        'name' => 'contact_id1_c',
        'vname' => 'LBL_CONTACT_NUMBER_CONTACT_ID',
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
      'contact_number' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'contact_number',
        'vname' => 'LBL_CONTACT_NUMBER',
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
        'id_name' => 'contact_id1_c',
        'ext2' => 'Contacts',
        'module' => 'Contacts',
        'rname' => 'employee_number_c',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),

      'contact_name' => 
      array (
          'name' => 'contact_name',
          'vname' => 'LBL_CONTACT_NAME',
          'type' => 'varchar',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),

      'line_items' =>
      array(
        'required' => false,
        'name' => 'line_items',
        'vname' => 'LBL_LINE_ITEMS',
        'type' => 'varchar',
        'source' => 'non-db',
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

      'line_subitems' =>
      array(
        'required' => false,
        'name' => 'line_items',
        'vname' => 'LBL_LINE_SUBITEMS',
        'type' => 'varchar',
        'source' => 'non-db',
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
'relationships' => array (
    ),
'optimistic_locking' => true,
'unified_search' => true,
);
if (!class_exists('VardefManager')) {
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAOS_Payments', 'HAOS_Payments', array('basic','assignable','security_groups'));
