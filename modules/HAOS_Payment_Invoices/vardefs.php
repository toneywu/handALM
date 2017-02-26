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

$dictionary['HAOS_Payment_Invoices'] = array(
  'table' => 'haos_payment_invoices',
  'audited' => true,
  'inline_edit' => true,
  'duplicate_merge' => true,
  'fields' => array (
    'haos_payments_id_c' => 
    array (
      'required' => false,
      'name' => 'haos_payments_id_c',
      'vname' => 'LBL_PAYMENT_NAME_HAOS_PAYMENTS_ID',
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
    'payment_name' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'payment_name',
      'vname' => 'LBL_PAYMENT_NAME',
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
      'id_name' => 'haos_payments_id_c',
      'ext2' => 'HAOS_Payments',
      'module' => 'HAOS_Payments',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'aos_invoices_id_c' => 
    array (
      'required' => false,
      'name' => 'aos_invoices_id_c',
      'vname' => 'LBL_INVOICE_NUMBER_AOS_INVOICES_ID',
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
    'invoice_number' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'invoice_number',
      'vname' => 'LBL_INVOICE_NUMBER',
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
      'id_name' => 'aos_invoices_id_c',
      'ext2' => 'AOS_Invoices',
      'module' => 'AOS_Invoices',
      'rname' => 'number',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),

    

      'invoice_name' => 
      array (
          'name' => 'invoice_name',
          'vname' => 'LBL_INVOICE_NAME',
          'type' => 'varchar',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),
      'invoice_date' => 
      array (
          'name' => 'invoice_date',
          'vname' => 'LBL_INVOICE_DATE',
          'type' => 'date',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),
      'invoice_due_date' => 
      array (
          'name' => 'invoice_due_date',
          'vname' => 'LBL_INVOICE_DUE_DATE',
          'type' => 'date',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),
      'invoice_overdue_days' => 
      array (
          'name' => 'invoice_overdue_days',
          'vname' => 'LBL_INVOICE_OVERDUE_DAYS',
          'type' => 'varchar',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),
      'invoice_unpaid_amount' => 
      array (
          'name' => 'invoice_unpaid_amount',
          'vname' => 'LBL_INVOICE_UNPAID_AMOUNT',
          'type' => 'currency',
          'len' => '240',
          'source' => 'non-db',
          'studio' => 'visible',
          ),

    'amount' => 
    array (
      'required' => true,
      'name' => 'amount',
      'vname' => 'LBL_AMOUNT',
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
    'currency_id' => 
    array (
      'required' => false,
      'name' => 'currency_id',
      'vname' => 'LBL_CURRENCY',
      'type' => 'currency_id',
      'massupdate' => 0,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => false,
      'inline_edit' => true,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 36,
      'size' => '20',
      'dbType' => 'id',
      'studio' => 'visible',
      'function' => 
      array (
        'name' => 'getCurrencyDropDown',
        'returns' => 'html',
        ),
      ),
    'amount_usdollar' => 
    array (
      'required' => false,
      'name' => 'amount_usdollar',
      'vname' => 'LBL_AMOUNT_USDOLLAR',
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
    ),
'relationships' => array (
  ),
'optimistic_locking' => true,
'unified_search' => true,
);
if (!class_exists('VardefManager')) {
  require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAOS_Payment_Invoices', 'HAOS_Payment_Invoices', array('basic','assignable','security_groups'));
