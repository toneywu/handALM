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

$dictionary['HAM_WO_Lines'] = array(
	'table'=>'ham_wo_lines',
	'audited'=>true,
    'inline_edit'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
#工作单头
'ham_wo_id' => 
      array (
            'required' => false,
            'name' => 'ham_wo_id',
            'vname' => 'LBL_HAM_WO_ID',
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
'wo_number' => 
  array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'wo_number',
		'vname' => 'LBL_WO_NUMBER',
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
		'id_name' => 'ham_wo_id',
		'ext2' => 'HAM_WO',
		'module' => 'HAM_WO',
		'rname' => 'wo_number',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		),		
#合同号
'contract_id' => 
      array (
            'required' => false,
            'name' => 'contract_id',
            'vname' => 'LBL_CONTRACT_ID',
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
'contract' => 
  array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'contract',
		'vname' => 'LBL_CONTRACT',
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
		'id_name' => 'contract_id',
		'ext2' => 'AOS_Contracts',
		'module' => 'AOS_Contracts',
		'rname' => 'name',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		),			


#产品
'product_id' => 
      array (
            'required' => false,
            'name' => 'product_id',
            'vname' => 'LBL_PRODUCT_ID',
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
'product' => 
  array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'product',
		'vname' => 'LBL_PRODUCT',
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
		'id_name' => 'product_id',
		'ext2' => 'AOS_Products',
		'module' => 'AOS_Products',
		'rname' => 'name',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		),			


#资产
'asset_id' => 
      array (
            'required' => false,
            'name' => 'asset_id',
            'vname' => 'LBL_ASSET_ID',
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
		'id_name' => 'asset_id',
		'ext2' => 'HAT_Assets',
		'module' => 'HAT_Assets',
		'rname' => 'asset_number',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		),	

#单位
'uom_id' => 
      array (
            'required' => false,
            'name' => 'uom_id',
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
'uom_code' => 
  array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'uom_code',
		'vname' => 'LBL_UOM_CODE',
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
		'id_name' => 'uom_id',
		'ext2' => 'HAA_UOM',
		'module' => 'HAA_UOM',
		'rname' => 'uom_code',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		),	

'quantity' => 
  array (
    'required' => false,
    'name' => 'quantity',
    'vname' => 'LBL_QUANTITY',
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
    'precision' => '2',
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
VardefManager::createVardef('HAM_WO_Lines','HAM_WO_Lines', array('basic','assignable','security_groups'));