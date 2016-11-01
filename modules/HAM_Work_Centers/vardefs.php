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

$dictionary['HAM_Work_Centers'] = array(
	'table'=>'ham_work_centers',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (

#维护区域		
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
  
  /*
'sr_hat_domains_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_hat_domains_rule_id',
      'vname' => 'SR_HAA_FRAMEWORKS_RULE_ID',
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
  
'sr_hat_domains_rule' => //资产运营区域
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_hat_domains_rule',
      'vname' => 'LBL_SR_HAA_FRAMEWORKS_RULE',
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
      'ext2' => 'HAA_Frameworks',
      'module' => 'HAA_Frameworks',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
	  */
    'framework' =>
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'framework',
      'vname' => 'LBL_FRAMEWORK',
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
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),

'sr_ham_maint_sites_rule_id' => 
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

'work_center_number' => 
  array (
    'required' => false,
    'name' => 'work_center_number',
    'vname' => 'LBL_WORK_CENTER_NUMBER',
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

 /*'workcenter_act_link' =>
      array(
        'name' => 'workcenter_act_link',
        'type' => 'link',
        'relationship' => 'ham_workcenter_act',
        'vname' => 'LBL_WORK_CENTER_ACT_SUBPANEL_TITLE',
        'link_type' => 'many',
        'module' => 'HAM_ACT',
        'bean_name' => 'HAM_ACT',
        'source' => 'non-db',
		),
	*/	
 'workcenter_res_link' =>
      array(
        'name' => 'workcenter_res_link',
        'type' => 'link',
        'relationship' => 'ham_workcenter_res',
        'vname' => 'LBL_WORK_CENTER_RES_SUBPANEL_TITLE',
        'link_type' => 'many',
        'module' => 'HAM_Work_Center_Res',
        'bean_name' => 'HAM_Work_Center_Res',
        'source' => 'non-db',
		),	

		
),

'relationships'=>array (
     
	/* 'ham_workcenter_act' =>
      array (
      'lhs_module' => 'HAM_Work_Centers',
      'lhs_table' => 'ham_work_centers',
      'lhs_key'   => 'id',
      'rhs_module' => 'HAM_ACT',
      'rhs_table' => 'ham_act',
      'rhs_key'   => 'ham_work_id',
      'relationship_type' => 'one-to-many',
      ),
	*/

	'ham_workcenter_res' =>
      array (
      'lhs_module' => 'HAM_Work_Centers',
      'lhs_table' => 'ham_work_centers',
      'lhs_key'   => 'id',
      'rhs_module' => 'HAM_Work_Center_Res',
      'rhs_table' => 'ham_work_center_res',
      'rhs_key'   => 'work_center_id',
      'relationship_type' => 'one-to-many',
      ),
	  
	  
),


	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAM_Work_Centers','HAM_Work_Centers', array('basic','assignable','security_groups'));