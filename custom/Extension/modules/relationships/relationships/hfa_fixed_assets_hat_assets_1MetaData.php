<?php
// created: 2016-08-28 23:51:57
$dictionary["hfa_fixed_assets_hat_assets_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'hfa_fixed_assets_hat_assets_1' => 
    array (
      'lhs_module' => 'HFA_Fixed_Assets',
      'lhs_table' => 'hfa_fixed_assets',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Assets',
      'rhs_table' => 'hat_assets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hfa_fixed_assets_hat_assets_1_c',
      'join_key_lhs' => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
      'join_key_rhs' => 'hfa_fixed_assets_hat_assets_1hat_assets_idb',
    ),
  ),
  'table' => 'hfa_fixed_assets_hat_assets_1_c',
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
      'name' => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hfa_fixed_assets_hat_assets_1hat_assets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hfa_fixed_assets_hat_assets_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hfa_fixed_assets_hat_assets_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hfa_fixed_assets_hat_assets_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hfa_fixed_assets_hat_assets_1hat_assets_idb',
      ),
    ),
  ),
);