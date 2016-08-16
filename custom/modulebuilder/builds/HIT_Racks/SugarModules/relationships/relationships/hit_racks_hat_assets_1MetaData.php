<?php
// created: 2016-04-26 22:35:53
$dictionary["hit_racks_hat_assets_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hit_racks_hat_assets_1' => 
    array (
      'lhs_module' => 'HIT_Racks',
      'lhs_table' => 'hit_racks',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Assets',
      'rhs_table' => 'hat_assets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hit_racks_hat_assets_1_c',
      'join_key_lhs' => 'hit_racks_hat_assets_1hit_racks_ida',
      'join_key_rhs' => 'hit_racks_hat_assets_1hat_assets_idb',
    ),
  ),
  'table' => 'hit_racks_hat_assets_1_c',
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
      'name' => 'hit_racks_hat_assets_1hit_racks_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hit_racks_hat_assets_1hat_assets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hit_racks_hat_assets_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hit_racks_hat_assets_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hit_racks_hat_assets_1hit_racks_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hit_racks_hat_assets_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hit_racks_hat_assets_1hat_assets_idb',
      ),
    ),
  ),
);