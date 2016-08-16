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

$dictionary['HAA_UOM_Conversions'] = array(
	'table'=>'haa_uom_conversions',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (
/*      'type' => 
      array (
        'required' => false,
        'name' => 'type',
        'vname' => 'LBL_TYPE',
        'type' => 'enum',
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
        'len' => 100,
        'size' => '20',
        'options' => 'haa_uom_conversion_type_list',
        'studio' => 'visible',
        'dependency' => false,
        ),
      'aos_products_id' => 
      array (
          'inline_edit' => false,
          'required' => false,
          'name' => 'aos_products_id',
          'vname' => 'LBL_AOS_PRODUCTS_ID',
          'type' => 'id',
          'massupdate' => '0',
          'default' => NULL,
          'no_default' => false,
          'comments' => '',
          'help' => '',
          'importable' => 'true',
          'duplicate_merge' => 'disabled',
          'duplicate_merge_dom_value' => '0',
          'audited' => false,
          'reportable' => false,
          'unified_search' => false,
          'merge_filter' => 'disabled',
          'len' => '36',
          'size' => '20',
          ),
      'aos_products' =>
      array (
          'inline_edit' => false,
          'required' => true,
          'source' => 'non-db',
          'name' => 'aos_products',
          'vname' => 'LBL_AOS_PRODUCTS',
          'type' => 'relate',
          'massupdate' => '0',
          'default' => NULL,
          'no_default' => false,
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
          'id_name' => 'aos_products_id',
          'ext2' => 'AOS_Products',
          'module' => 'AOS_Products',
          'rname' => 'name',
          'quicksearch' => 'enabled',
          'studio' => 'visible',
          'id' => 'aos_products_id',
          ),*/
      'destination_uom_classes_id' => 
      array (
        'required' => false,
        'name' => 'destination_uom_classes_id',
        'vname' => 'LBL_DESTINATION_UOM_CLASSES_ID',
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
      'destination_uom_class' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'destination_uom_class',
        'vname' => 'LBL_DESTINATION_UOM_CLASS',
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
        'id_name' => 'destination_uom_classes_id',
        'ext2' => 'HAA_UOM_Classes',
        'module' => 'HAA_UOM_Classes',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'destination_unit_id' => 
      array (
        'required' => false,
        'name' => 'destination_unit_id',
        'vname' => 'LBL_DESTINATION_UNIT_ID',
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
      'destination_unit' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'destination_unit',
        'vname' => 'LBL_DESTINATION_UNIT',
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
        'id_name' => 'destination_unit_id',
        'ext2' => 'HAA_UOM',
        'module' => 'HAA_UOM',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'source_uom_class_id' => 
      array (
        'required' => false,
        'name' => 'source_uom_class_id',
        'vname' => 'LBL_SOURCE_UOM_CLASS_ID',
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
      'source_uom_class' => 
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'source_uom_class',
        'vname' => 'LBL_SOURCE_UOM_CLASS',
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
        'id_name' => 'source_uom_class_id',
        'ext2' => 'HAA_UOM_Classes',
        'module' => 'HAA_UOM_Classes',
        'rname' => 'name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
    'source_uom' =>
      array (
        'required' => true,
        'source' => 'non-db',
        'name' => 'source_uom',
        'vname' => 'LBL_SOURCE_UOM',
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
        'id_name' => 'source_uom_class_id',
        'ext2' => 'HAA_UOM_Classes',
        'module' => 'HAA_UOM_Classes',
        'rname' => 'base_unit_name',
        'quicksearch' => 'enabled',
        'studio' => 'visible',
        ),
      'conversion' =>
      array (
        'required' => true,
        'name' => 'conversion',
        'vname' => 'LBL_CONVERSION',
        'type' => 'float',
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
        'len' => '18',
        'size' => '20',
        'enable_range_search' => false,
        'precision' => '8',
        ),
      'primary_uom_conversion_str' =>
      array (
        'required' => false,
        'name' => 'primary_uom_conversion_str',
        'vname' => 'LBL_PRIMARY_UOM_CONVERISON',
        'source' => 'non-db',
        'type'=>'vchar',
        'comments' => '',
        'help' => '',
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '18',
        'size' => '20',
        'enable_range_search' => false,
        ),
    'primary_uom_conversion' =>
      array (
        'required' => false,
        'name' => 'primary_uom_conversion',
        'vname' => 'LBL_PRIMARY_UOM_CONVERISON',
        'source' => 'non-db',
        'type'=>'vchar',
        'comments' => '',
        'help' => '',
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '18',
        'size' => '20',
        'enable_range_search' => false,
        ),
    'primary_uom' =>
      array (
        'required' => false,
        'name' => 'primary_uom',
        'vname' => 'LBL_PRIMARY_UOM',
        'source' => 'non-db',
        'type'=>'vchar',
        'comments' => '',
        'help' => '',
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '18',
        'size' => '20',
        'enable_range_search' => false,
        ),
     ),

'relationships'=>array (

/*    'haa_uom_conversions_aos_products' => 
        array (
            'lhs_module' => 'HAA_UOM_Conversions',
            'lhs_table' => 'haa_uom_conversions',
            'lhs_key'   => 'aos_products_id',
            'rhs_module' => 'AOS_Products',
            'rhs_table' => 'aos_products',
            'rhs_key'   => 'id',
            'relationship_type' => 'many-to-one',
            ),

*/
    ),
'optimistic_locking'=>true,
'unified_search'=>true,
);
if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAA_UOM_Conversions','HAA_UOM_Conversions', array('basic','assignable','security_groups'));