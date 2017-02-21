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

$dictionary['HAM_Maint_Sites'] = array(
	'table'=>'ham_maint_sites',
	'audited'=>true,
  'inline_edit'=>true,
  'duplicate_merge'=>true,
  'fields'=>array (
    'haa_frameworks_id' =>
    array (
      'required' => false,
      'name' => 'haa_frameworks_id',
      'vname' => 'LBL_HAA_FRAMEWORKS_ID',
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
    'haa_framework' =>
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'haa_framework',
      'vname' => 'LBL_HAA_FRAMEWORK',
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
      'id_name' => 'haa_frameworks_id',
      'ext2' => 'HAA_Frameworks',
      'module' => 'HAA_Frameworks',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'title' => 
    array (
      'required' => true,
      'name' => 'title',
      'vname' => 'LBL_TITLE',
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

            'deft_unassigned_location_id' => array (
                  'required' => false,
                  'name' => 'deft_unassigned_location_id',
                  'vname' => 'LBL_DEFT_UNASSIGNED_LOCATION_ID',
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
            'deft_unassigned_location' => array (
                  'required' => false,
                  'source' => 'non-db',
                  'name' => 'deft_unassigned_location',
                  'vname' => 'LBL_DEFT_UNASSIGNED_LOCATION',
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
                  'id_name' => 'deft_unassigned_location_id',
                  'ext2' => 'HAT_Asset_Locations',
                  'module' => 'HAT_Asset_Locations',
                  'rname' => 'name',
                  'quicksearch' => 'enabled',
                  'studio' => 'visible',
            ),   
    'sr_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_haa_numbering_rule_id',
      'vname' => 'LBL_SR_HAA_NUMBERING_RULE_ID',
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
    'sr_haa_numbering_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_haa_numbering_rule',
      'vname' => 'LBL_SR_HAA_NUMBERING_RULE',
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
      'id_name' => 'sr_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'wo_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'wo_haa_numbering_rule_id',
      'vname' => 'LBL_WO_HAA_NUMBERING_RULE_ID',
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
    'wo_haa_numbering_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'wo_haa_numbering_rule',
      'vname' => 'LBL_WO_HAA_NUMBERING_RULE',
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
      'id_name' => 'wo_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
     'hmm_trans_lines_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'hmm_trans_lines_haa_numbering_rule_id',
      'vname' => 'LBL_HMM_TRANS_LINES_HAA_NUMBERING_RULE_ID',
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
    'hmm_trans_lines_haa_numbering_rule' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'hmm_trans_lines_haa_numbering_rule',
      'vname' => 'LBL_HMM_TRANS_LINES_HAA_NUMBERING_RULE',
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
      'id_name' => 'hmm_trans_lines_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
'hmm_trans_batch_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'hmm_trans_batch_haa_numbering_rule_id',
      'vname' => 'LBL_HMM_TRANS_BATCH_HAA_NUMBERING_RULE_ID',
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
    'hmm_trans_batch_haa_numbering_rule' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'hmm_trans_batch_haa_numbering_rule',
      'vname' => 'LBL_HMM_TRANS_BATCH_HAA_NUMBERING_RULE',
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
      'id_name' => 'hmm_trans_batch_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
'hmm_mo_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'hmm_mo_haa_numbering_rule_id',
      'vname' => 'LBL_HMM_MO_BATCH_HAA_NUMBERING_RULE_ID',
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
    'hmm_mo_haa_numbering_rule' =>
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'hmm_mo_haa_numbering_rule',
      'vname' => 'LBL_HMM_MO_HAA_NUMBERING_RULE',
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
      'id_name' => 'hmm_mo_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
    'locator_coding_mask' =>
    array (
      'required' => false,
      'name' => 'locator_coding_mask',
      'vname' => 'LBL_LOCATOR_CODING_MASK',
      'type' => 'varchar',
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
      ),
'hmm_mo_lines_haa_numbering_rule_id' => 
    array (
      'required' => false,
      'name' => 'hmm_mo_lines_haa_numbering_rule_id',
      'vname' => 'LBL_HMM_MO_LINES_BATCH_HAA_NUMBERING_RULE_ID',
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
    'hmm_mo_lines_haa_numbering_rule' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'name' => 'hmm_mo_lines_haa_numbering_rule',
      'vname' => 'LBL_HMM_MO_LINES_HAA_NUMBERING_RULE',
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
      'id_name' => 'hmm_mo_lines_haa_numbering_rule_id',
      'ext2' => 'HAA_Numbering_Rule',
      'module' => 'HAA_Numbering_Rule',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),    
    'locator_coding_mask_desc' => 
    array (
      'required' => false,
      'name' => 'locator_coding_mask_desc',
      'vname' => 'LBL_LOCATOR_CODING_MASK_DESC',
      'type' => 'varchar',
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
      ),
    'project_control' => 
    array (
      'required' => true,
      'name' => 'project_control',
      'vname' => 'LBL_PROJECT_CONTROL',
      'type' => 'enum',
      'massupdate' => '1',
      'default' => 'NONE',
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
      'options' => 'ham_project_control_list',
      'studio' => 'visible',
      'dependency' => false,
      ),

    ),

'indices'=>array (
    array (
      'name' => 'ham_maint_sitespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    array (
      'name' => 'idx_site_id_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'id',
        1 => 'deleted',
      ),
    ),
    array (
      'name' => 'idx_site_name_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'name',
        1 => 'deleted',
      ),
    ),
    array (
      'name' => 'idx_site_framework_del',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'haa_frameworks_id',
        1 => 'deleted',
      ),
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
VardefManager::createVardef('HAM_Maint_Sites','HAM_Maint_Sites', array('basic','assignable','security_groups'));