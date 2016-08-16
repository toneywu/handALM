<?php
// created: 2016-04-26 22:35:53
$dictionary["hit_racks_hat_assets"] = array (
  'true_relationship_type' => 'one-to-one',
  'relationships' => 
  array (
    'hit_racks_hat_assets' => 
    array (
      'lhs_module' => 'HIT_Racks',
      'lhs_table' => 'hit_racks',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Assets',
      'rhs_table' => 'hat_assets',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hit_racks_hat_assets_c',
      'join_key_lhs' => 'hit_racks_hat_assetshit_racks_ida',
      'join_key_rhs' => 'hit_racks_hat_assetshat_assets_idb',
    ),
  ),
  'table' => 'hit_racks_hat_assets_c',
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
      'name' => 'hit_racks_hat_assetshit_racks_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hit_racks_hat_assetshat_assets_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hit_racks_hat_assetsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hit_racks_hat_assets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hit_racks_hat_assetshit_racks_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hit_racks_hat_assets_idb2',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hit_racks_hat_assetshat_assets_idb',
      ),
    ),
  ),
);