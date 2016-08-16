<?php
// created: 2016-03-03 09:48:07
$dictionary["ham_sr_hat_assets"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'ham_sr_hat_assets' => 
    array (
      'lhs_module' => 'HAT_Assets',
      'lhs_table' => 'hat_assets',
      'lhs_key' => 'id',
      'rhs_module' => 'HAM_SR',
      'rhs_table' => 'ham_sr',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ham_sr_hat_assets_c',
      'join_key_lhs' => 'ham_sr_hat_assetshat_assets_ida',
      'join_key_rhs' => 'ham_sr_hat_assetsham_sr_idb',
    ),
  ),
  'table' => 'ham_sr_hat_assets_c',
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
      'name' => 'ham_sr_hat_assetshat_assets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ham_sr_hat_assetsham_sr_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ham_sr_hat_assetsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ham_sr_hat_assets_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'ham_sr_hat_assetshat_assets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'ham_sr_hat_assets_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ham_sr_hat_assetsham_sr_idb',
      ),
    ),
  ),
);