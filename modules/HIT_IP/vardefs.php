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

$dictionary['HIT_IP'] = array(
	'table'=>'hit_ip',
	'audited'=>false,
    'inline_edit'=>false,
    'duplicate_merge'=>false,
    'fields'=>array (
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

      'hit_vlan_id' => 
      array (
        'required' => false,
        'name' => 'hit_vlan_id',
        'vname' => 'LBL_VLAN_ID',
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
      'vlan' => 
      array (
        'required' => false,
        'source' => 'non-db',
        'name' => 'vlan',
        'vname' => 'LBL_VLAN',
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
        'id_name' => 'hit_vlan_id',
        'ext2' => 'HIT_VLAN',
        'module' => 'HIT_VLAN',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      
      'ip_usage' => 
      array (
        'required' => false,
        'name' => 'ip_usage',
        'vname' => 'LBL_IP_USAGE',
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

      'line_items' =>
      array (
        'required' => false,
        'name' => 'line_items',
        'vname' => 'LBL_SUBNET_LINES',
        'type' => 'function',
        'source' => 'non-db',
        'massupdate' => 0,
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => false,
        'function' =>
        array(
            'name' => 'display_lines',
            'returns' => 'html',
            'include' => 'modules/HIT_IP/Render_HIT_IP_Line_Items.php'
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
VardefManager::createVardef('HIT_IP','HIT_IP', array('basic','assignable','security_groups'));