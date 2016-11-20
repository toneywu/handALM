<?php
// created: 2016-11-18 15:23:20
$dictionary["hpr_groups_hpr_group_priviliges"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hpr_groups_hpr_group_priviliges' => 
    array (
      'lhs_module' => 'HPR_Groups',
      'lhs_table' => 'hpr_groups',
      'lhs_key' => 'id',
      'rhs_module' => 'HPR_Group_Priviliges',
      'rhs_table' => 'hpr_group_priviliges',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hpr_groups_hpr_group_priviliges_c',
      'join_key_lhs' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
      'join_key_rhs' => 'hpr_groups_hpr_group_priviligeshpr_group_priviliges_idb',
    ),
  ),
  'table' => 'hpr_groups_hpr_group_priviliges_c',
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
      'name' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hpr_groups_hpr_group_priviligeshpr_group_priviliges_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hpr_groups_hpr_group_priviligesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hpr_groups_hpr_group_priviliges_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hpr_groups_hpr_group_priviliges_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hpr_groups_hpr_group_priviligeshpr_group_priviliges_idb',
      ),
    ),
  ),
);