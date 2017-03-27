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

$dictionary['HAM_ACT_OP'] = array(
	'table'=>'ham_act_op',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
'contact_id' => 
      array (
            'required' => false,
            'name' => 'contact_id',
            'vname' => 'LBL_CONTACT_ID',
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
'contact' => 
      array (
            'required' => false,
            'source' => 'non-db',
            'name' => 'contact',
            'vname' => 'LBL_CONTACT',
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

#标准时长
'standard_hour' => 
  array (
    'required' => false,
    'name' => 'standard_hour',
    'vname' => 'LBL_STANDARD_HOUR',
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
  
#序号	
'activity_op_number' => 
      array (
            'required' => false,
            'name' => 'activity_op_number',
            'vname' => 'LBL_ACTIVITY_OP_NUMBER',
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
#工序状态			
'activity_status' => 
      array (
            'required' => true,
            'name' => 'activity_status',
            'vname' => 'LBL_ACTIVITY_STATUS',
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
#工作中心
'sr_work_center_rule_id' => 
    array (
      'required' => true,
      'name' => 'sr_work_center_rule_id',
      'vname' => 'SR_SR_WORK_CENTER_RULE_ID',
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
	  
	  
'sr_work_center_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_work_center_rule',
      'vname' => 'SR_SR_WORK_CENTER_RULE',
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
      'id_name' => 'sr_work_center_rule_id',
      'ext2' => 'HAM_Work_Centers',
      'module' => 'HAM_Work_Centers',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),
				
#活动头
'ham_act_id' => 
    array (
      'required' => false,
      'name' => 'ham_act_id',
      'vname' => 'HAM_ACT_ID',
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
	  
	  
'ham_act_id_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'ham_act_id_rule',
      'vname' => 'HAM_ACT_ID_RULE',
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
      'id_name' => 'ham_act_id',
      'ext2' => 'HAM_ACT',
      'module' => 'HAM_ACT',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
 ),
 #动作功能模块
'act_module' =>
        array (
            'required' => false,
            'name' => 'act_module',
            'vname' => 'LBL_ACT_MODULE',
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
            'options' => 'ham_woop_moduleList',
            'studio' => 'visible',
            'dependency' => false,
            ), 
        'hat_eventtype_id' => 
        array (
          'required' => false,
          'name' => 'hat_eventtype_id',
          'vname' => 'LBL_HAT_EVENTTYPE_ID',
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
          'id_name' => 'hat_eventtype_id',
          'ext2' => 'HAT_EventType',
          'module' => 'HAT_EventType',
          'rname' => 'name',
          'quicksearch' => 'enabled',
          'studio' => 'visible',
          ),
#完工后打开下道工序
'autoopen_next_task' =>
      array (
        'name' => 'autoopen_next_task',
        'vname' => 'LBL_AUTOOPEN_NEXT_TASK',
        'type' => 'bool',
        'default'=>true,
        'reportable' => true,
        'studio' => 'visible'
        ),

 #工作中心资源-->人员
'work_center_res_id' => 
  array (
    'required' => true,
    'name' => 'work_center_res_id',
    'vname' => 'LBL_WORK_CENTER_RES_ID',
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

'ham_work_center_res_name' => 
  array (
    'required' => true,
    'source' => 'non-db',
    'name' => 'ham_work_center_res_name',
    'vname' => 'LBL_HAM_WORK_CENTER_RES_NAME',
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
    'id_name' => 'work_center_res_id',
    'ext2' => 'HAM_Work_Center_Res',
    'module' => 'HAM_Work_Center_Res',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),

		
/*'hat_assets_id' => 
      array (
            'required' => false,
            'name' => 'hat_assets_id',
            'vname' => 'LBL_HAT_ASSETS_ID',
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
            'inline_edit' => true,
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
        'name' => 'asset_desc',
        'vname' => 'LBL_ASSET_DESC',
        'type' => 'varchar',
        'default'=>'',
        'reportable' => true,
        'studio' => 'visible'
        ),
		*/
/*'activity_num' => 
  array (
    'required' => false,
    'name' => 'activity_num',
    'vname' => 'LBL_ACTIVITY_NUM',
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
  ),*/
  
'sr_aos_products_rule_id' => 
    array (
      'required' => false,
      'name' => 'sr_aos_products_rule_id',
      'vname' => 'SR_AOS_PRODUCTS_RULE_ID',
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
'sr_aos_products_rule' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'sr_aos_products_rule',
      'vname' => 'SR_AOS_PRODUCTS_RULE',
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
      'id_name' => 'sr_aos_products_rule_id',
      'ext2' => 'AOS_Products',
      'module' => 'AOS_Products',
      'rname' => 'name',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      ),

	     'ham_act_checklists_link' => array (
      'name' => 'ham_act_checklists_link',
      'type' => 'link',
      'relationship' => 'ham_act_checklists',
      'vname' => 'LBL_ACT_CHECKLISTS_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_ACT_Checklists',
      'bean_name' => 'HAM_ACT_Checklists',
      'source' => 'non-db',
      ),

       'ham_act_labors_link' => array (
      'name' => 'ham_act_labors_link',
      'type' => 'link',
      'relationship' => 'ham_act_labors',
      'vname' => 'LBL_ACT_LABORS_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_ACT_Labors',
      'bean_name' => 'HAM_ACT_Labors',
      'source' => 'non-db',
      ),
             'ham_act_materials_link' => array (
      'name' => 'ham_act_materials_link',
      'type' => 'link',
      'relationship' => 'ham_act_materials',
      'vname' => 'LBL_ACT_MATERIALS_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_ACT_Materials',
      'bean_name' => 'HAM_ACT_Materials',
      'source' => 'non-db',
      ),
                   'ham_act_subcontracts_link' => array (
      'name' => 'ham_act_checklists_link',
      'type' => 'link',
      'relationship' => 'ham_act_subcontracts',
      'vname' => 'LBL_ACT_CHECKLISTS_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_ACT_Subcontracts',
      'bean_name' => 'HAM_ACT_Subcontracts',
      'source' => 'non-db',
      ),
                         'ham_act_tools_link' => array (
      'name' => 'ham_act_tools_link',
      'type' => 'link',
      'relationship' => 'ham_act_tools',
      'vname' => 'LBL_ACT_TOOLS_SUBPANEL_TITLE',
      'link_type' => 'many',
      'module' => 'HAM_ACT_Tools',
      'bean_name' => 'HAM_ACT_Tools',
      'source' => 'non-db',
      ),

),
	'relationships'=>array (

  'ham_act_checklists' => array (
    'lhs_module' => 'HAM_ACT_OP',
    'lhs_table' => 'ham_act_op',
    'lhs_key' => 'id',
    'rhs_module' => 'HAM_ACT_Checklists',
    'rhs_table' => 'ham_act_checklists',
    'rhs_key' => 'ham_act_op_id',
    'relationship_type' => 'one-to-many',
    ),

  'ham_act_labors' => array (
    'lhs_module' => 'HAM_ACT_OP',
    'lhs_table' => 'ham_act_op',
    'lhs_key' => 'id',
    'rhs_module' => 'HAM_ACT_Labors',
    'rhs_table' => 'ham_act_labors',
    'rhs_key' => 'ham_act_op_id',
    'relationship_type' => 'one-to-many',
    ),

  'ham_act_materials' => array (
    'lhs_module' => 'HAM_ACT_OP',
    'lhs_table' => 'ham_act_op',
    'lhs_key' => 'id',
    'rhs_module' => 'HAM_ACT_Materials',
    'rhs_table' => 'ham_act_materials',
    'rhs_key' => 'ham_act_op_id',
    'relationship_type' => 'one-to-many',
    ),

  'ham_act_subcontracts' => array (
    'lhs_module' => 'HAM_ACT_OP',
    'lhs_table' => 'ham_act_op',
    'lhs_key' => 'id',
    'rhs_module' => 'HAM_ACT_Subcontracts',
    'rhs_table' => 'ham_act_subcontracts',
    'rhs_key' => 'ham_act_op_id',
    'relationship_type' => 'one-to-many',
    ),

  'ham_act_tools' => array (
    'lhs_module' => 'HAM_ACT_OP',
    'lhs_table' => 'ham_act_op',
    'lhs_key' => 'id',
    'rhs_module' => 'HAM_ACT_Tools',
    'rhs_table' => 'ham_act_tools',
    'rhs_key' => 'ham_act_op_id',
    'relationship_type' => 'one-to-many',
    ),


),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAM_ACT_OP','HAM_ACT_OP', array('basic','assignable','security_groups'));