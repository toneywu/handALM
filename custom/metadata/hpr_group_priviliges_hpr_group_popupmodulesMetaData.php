<?php
// created: 2016-12-20 20:44:37
$dictionary["hpr_group_priviliges_hpr_group_popupmodules"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hpr_group_priviliges_hpr_group_popupmodules' => 
    array (
      'lhs_module' => 'HPR_Group_Priviliges',
      'lhs_table' => 'hpr_group_priviliges',
      'lhs_key' => 'id',
      'rhs_module' => 'HPR_Group_PopupModules',
      'rhs_table' => 'hpr_group_popupmodules',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hpr_group_priviliges_hpr_group_popupmodules_c',
      'join_key_lhs' => 'hpr_group_dcbfviliges_ida',
      'join_key_rhs' => 'hpr_group_bc9bmodules_idb',
    ),
  ),
  'table' => 'hpr_group_priviliges_hpr_group_popupmodules_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'hpr_group_dcbfviliges_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hpr_group_bc9bmodules_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hpr_group_priviliges_hpr_group_popupmodulesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hpr_group_priviliges_hpr_group_popupmodules_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hpr_group_dcbfviliges_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hpr_group_priviliges_hpr_group_popupmodules_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hpr_group_bc9bmodules_idb',
      ),
    ),
  ),
);