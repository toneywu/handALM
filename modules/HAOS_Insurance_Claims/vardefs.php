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

$dictionary['HAOS_Insurance_Claims'] = array(
	'table'=>'haos_insurance_claims',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
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
      'haa_codes_id_c' => 
      array (
        'required' => false,
        'name' => 'haa_codes_id_c',
        'vname' => 'LBL_CLAIM_TYPE_HAA_CODES_ID',
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
      'claim_type' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'claim_type',
        'vname' => 'LBL_CLAIM_TYPE',
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
        'id_name' => 'haa_codes_id_c',
        'ext2' => 'HAA_Codes',
        'module' => 'HAA_Codes',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'claim_number' => 
      array (
        'required' => true,
        'name' => 'claim_number',
        'vname' => 'LBL_CLAIM_NUMBER',
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
      'parent_name' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'parent_name',
        'vname' => 'LBL_FLEX_RELATE',
        'type' => 'parent',
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
        'len' => 25,
        'size' => '20',
        'options' => 'parent_type_display',
        'studio' => 'visible',
        'type_name' => 'parent_type',
        'id_name' => 'parent_id',
        'parent_type' => 'record_type_display',
        ),
      'parent_type' => 
      array (
        'required' => false,
        'name' => 'parent_type',
        'vname' => 'LBL_PARENT_TYPE',
        'type' => 'parent_type',
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
        'len' => 255,
        'size' => '20',
        'dbType' => 'varchar',
        'studio' => 'hidden',
        ),
      'parent_id' => 
      array (
        'required' => false,
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
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
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => 36,
        'size' => '20',
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
      'claim_treated_status' => 
      array (
        'required' => true,
        'name' => 'claim_treated_status',
        'vname' => 'LBL_CLAIM_TREATED_STATUS',
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
        'options' => 'haos_claim_treated_status_list',
        'studio' => 'visible',
        'dependency' => false,
        ),
      'hat_incidents_id_c' => 
      array (
        'required' => false,
        'name' => 'hat_incidents_id_c',
        'vname' => 'LBL_RELATE_EVENT_NUMBER_HAT_INCIDENTS_ID',
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
      'relate_event_number' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'relate_event_number',
        'vname' => 'LBL_RELATE_EVENT_NUMBER',
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
        'id_name' => 'hat_incidents_id_c',
        'ext2' => 'HAT_Incidents',
        'module' => 'HAT_Incidents',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'ham_wo_id_c' => 
      array (
        'required' => false,
        'name' => 'ham_wo_id_c',
        'vname' => 'LBL_RELATE_WO_NUMBER_HAM_WO_ID',
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
      'relate_wo_number' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'relate_wo_number',
        'vname' => 'LBL_RELATE_WO_NUMBER',
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
        'id_name' => 'ham_wo_id_c',
        'ext2' => 'HAM_WO',
        'module' => 'HAM_WO',
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
      'claim_total_amount' => 
      array (
        'required' => false,
        'name' => 'claim_total_amount',
        'vname' => 'LBL_CLAIM_TOTAL_AMOUNT',
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
      'claim_total_amount_usdollar' => 
      array (
        'required' => false,
        'name' => 'claim_total_amount_usdollar',
        'vname' => 'LBL_CLAIM_TOTAL_AMOUNT_USDOLLAR',
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
      'gap_amount' => 
      array (
        'required' => false,
        'name' => 'gap_amount',
        'vname' => 'LBL_GAP_AMOUNT',
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
      'gap_amount_usdollar' => 
      array (
        'required' => false,
        'name' => 'gap_amount_usdollar',
        'vname' => 'LBL_GAP_AMOUNT_USDOLLAR',
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
      'act_claim_total_amt' => 
      array (
        'required' => false,
        'name' => 'act_claim_total_amt',
        'vname' => 'LBL_ACT_CLAIM_TOTAL_AMT',
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
      'act_claim_total_amt_usdollar' => 
      array (
        'required' => false,
        'name' => 'act_claim_total_amt_usdollar',
        'vname' => 'LBL_ACT_CLAIM_TOTAL_AMT_USDOLLAR',
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
      'attribute1' => 
      array (
        'required' => false,
        'name' => 'attribute1',
        'vname' => 'LBL_ATTRIBUTE1',
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
      'attribute2' => 
      array (
        'required' => false,
        'name' => 'attribute2',
        'vname' => 'LBL_ATTRIBUTE2',
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
      'attribute3' => 
      array (
        'required' => false,
        'name' => 'attribute3',
        'vname' => 'LBL_ATTRIBUTE3',
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
      'attribute4' => 
      array (
        'required' => false,
        'name' => 'attribute4',
        'vname' => 'LBL_ATTRIBUTE4',
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
      'attribute5' => 
      array (
        'required' => false,
        'name' => 'attribute5',
        'vname' => 'LBL_ATTRIBUTE5',
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
      'attribute6' => 
      array (
        'required' => false,
        'name' => 'attribute6',
        'vname' => 'LBL_ATTRIBUTE6',
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
      'attribute7' => 
      array (
        'required' => false,
        'name' => 'attribute7',
        'vname' => 'LBL_ATTRIBUTE7',
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
      'attribute8' => 
      array (
        'required' => false,
        'name' => 'attribute8',
        'vname' => 'LBL_ATTRIBUTE8',
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
      'attribute9' => 
      array (
        'required' => false,
        'name' => 'attribute9',
        'vname' => 'LBL_ATTRIBUTE9',
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
      'attribute10' => 
      array (
        'required' => false,
        'name' => 'attribute10',
        'vname' => 'LBL_ATTRIBUTE10',
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
      'time' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'time',
        'vname' => 'LBL_TIME',
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
        'len' => 25,
        'size' => '20',
        ),
      'location' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'location',
        'vname' => 'LBL_LOCATION',
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
        'len' => 25,
        'size' => '20',
        ),
      'comment' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'comment',
        'vname' => 'LBL_COMMENT',
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
        'len' => 25,
        'size' => '20',
        ),
      'wo_info' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'wo_info',
        'vname' => 'LBL_WO_INFO',
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
        'len' => 25,
        'size' => '20',
        ),
      'repair_cost' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'repair_cost',
        'vname' => 'LBL_REPAIR_COST',
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
        'len' => 25,
        'size' => '20',
        ),
      'other_repair_cost' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'other_repair_cost',
        'vname' => 'LBL_OTHER_REPAIR_COST',
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
        'len' => 25,
        'size' => '20',
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
      ),
'relationships'=>array (
    ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAOS_Insurance_Claims','HAOS_Insurance_Claims', array('basic','assignable','security_groups'));
