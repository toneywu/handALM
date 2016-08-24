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

$dictionary['HAM_ACT'] = array(
	'table'=>'ham_act',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
		
'act_status' => 
      array (
            'required' => true,
            'name' => 'act_status',
            'vname' => 'LBL_ACT_STATUS',
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
            'options' => 'ham_wo_status_list',
            'studio' => 'visible',
            'dependency' => false,
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
			
'sr_hat_domains_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_hat_domains_rule_id',
      'vname' => 'LBL_SR_HAT_DOMAINS_RULE_ID',
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
'sr_hat_domains_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_hat_domains_rule',
      'vname' => 'LBL_SR_HAT_DOMAINS_RULE',
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
      'id_name' => 'sr_hat_domains_rule_id',
      'ext2' => 'HAT_Domains',
      'module' => 'HAT_Domains',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
	  
/*'sr_ham_maint_sites_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_ham_maint_sites_rule_id',
      'vname' => 'SR_HAM_MAINT_SITES_RULE_ID',
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
'sr_ham_maint_sites_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_ham_maint_sites_rule',
      'vname' => 'SR_HAM_MAINT_SITES_RULE',
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
      'id_name' => 'sr_ham_maint_sites_rule_id',
      'ext2' => 'HAM_Maint_Sites',
      'module' => 'HAM_Maint_Sites',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
	  */
	  
'sr_haa_codes_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_haa_codes_rule_id',
      'vname' => 'SR_HAA_CODES_RULE_ID',
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
'sr_haa_codes_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_haa_codes_rule',
      'vname' => 'SR_HAA_CODES_RULE',
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
      'id_name' => 'sr_haa_codes_rule_id',
      'ext2' => 'HAA_Codes',
      'module' => 'HAA_Codes',
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
	  
	  
	  
/*'ham_work_id' => 
      array (
            'required' => false,
            'name' => 'ham_work_id',
            'vname' => 'LBL_WORK_ID',
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
			
'work_center_number' => 
      array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'work_center_number',
            'vname' => 'LBL_WORK_CENTER_NUMBER',
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
            'id_name' => 'ham_work_id',
            'ext2' => 'HAM_Work_Centers',
            'module' => 'HAM_Work_Centers',
            'rname' => 'work_center_number',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),*/

'act_op_link' =>
      array(
        'name' => 'act_op_link',
        'type' => 'link',
        'relationship' => 'ham_act_op',
        'vname' => 'LBL_ACT_OP_SUBPANEL_TITLE',
        'link_type' => 'many',
        'module' => 'HAM_ACT_OP',
        'bean_name' => 'HAM_ACT_OP',
        'source' => 'non-db',
		),
		
),

'relationships'=>array (
	
'ham_act_op' =>
      array (
      'lhs_module' => 'HAM_ACT',
      'lhs_table' => 'ham_act',
      'lhs_key'   => 'id',
      'rhs_module' => 'HAM_ACT_OP',
      'rhs_table' => 'ham_act_op',
      'rhs_key'   => 'ham_act_id',
      'relationship_type' => 'one-to-many',
      ),
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAM_ACT','HAM_ACT', array('basic','assignable','security_groups'));