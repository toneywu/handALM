<?php

$dictionary['HAA_UOM_Classes'] = array(
	'table'=>'haa_uom_classes',
	'audited'=>true,
    'inline_edit'=>true,
    'duplicate_merge'=>true,
    'fields'=>array (

        'base_unit_name' => 
        array (
            'required' => true,
            'source' => 'non-db',
            'name' => 'base_unit_name',
            'vname' => 'LBL_BASE_UNIT_NAME',
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
            'id_name' => 'base_unit_id',
            //'link'=> 'base_uom_link',
            'ext2' => 'HAA_UOM',
            'module' => 'HAA_UOM',
            'rname' => 'name',
            'quicksearch' => 'enabled',
            'studio' => 'visible',
            ),  
        'base_unit_code' => 
        array (
            'required' => true,
            'name' => 'base_unit_code',
            'id_name' => 'base_unit_id',
            'type' => 'relate',
            'rname' => 'uom_code',//which points to the field name in the related module record
            'vname' => 'LBL_BASE_UNIT_CODE',
            //'link' => 'uom_code',
            'module' => 'HAA_UOM',
            'source' => 'non-db', 
            'dbType' => 'non-db', 
            'studio' => 'visible',
            ),  
        'base_unit_symbol' => 
        array (
            'required' => true,
            'name' => 'base_unit_symbol',
            'id_name' => 'base_unit_id',
            'type' => 'relate',
            'rname' => 'uom_symbol',//which points to the field name in the related module record
            'vname' => 'LBL_BASE_UNIT_SYMBOL',
           // 'link' => 'base_unit_name',
            'module' => 'HAA_UOM',
            'source' => 'non-db', 
            'dbType' => 'non-db', 
            'studio' => 'visible',
            ), 
        'base_unit_id' => 
        array (
            'required' => false,
            'name' => 'base_unit_id',
            'vname' => 'LBL_BASE_UNIT_ID',
            'type' => 'id',
            'massupdate' => 0,
            'no_default' => false,
            'comments' => '',
            'help' => '',
            'importable' => false,
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

        'uom' =>
            array(
                'name' => 'uom',
                'type' => 'link',
                'relationship' => 'haa_uom_classes_haa_uom',
                'vname' => 'LBL_UOM',
                'link_type' => 'many',
                'module' => 'HAA_UOM',
                'bean_name' => 'HAA_UOM',
                'source' => 'non-db',
            ),

        ),
    'relationships'=>array (


        'haa_uom_classes_haa_uom' => 
        array (
            'lhs_module' => 'HAA_UOM_Classes',
            'lhs_table' => 'haa_uom_classes',
            'lhs_key'   => 'base_unit_id',
            'rhs_module' => 'HAA_UOM',
            'rhs_table' => 'haa_uom',
            'rhs_key'   => 'id',
            'relationship_type' => 'one-to-many',
            ),

        ),
    'optimistic_locking'=>true,
    'unified_search'=>true,
    );

if (!class_exists('VardefManager')){
    require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('HAA_UOM_Classes','HAA_UOM_Classes', array('basic','security_groups'));