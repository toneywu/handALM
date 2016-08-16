<?php
// created: 2016-02-08 07:56:33
$dictionary["hat_assets_hat_asset_trans"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_assets_hat_asset_trans' => 
    array (
      'lhs_module' => 'HAT_Assets',
      'lhs_table' => 'hat_assets',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Asset_Trans',
      'rhs_table' => 'hat_asset_trans',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_assets_hat_asset_trans_c',
      'join_key_lhs' => 'hat_assets_hat_asset_transhat_assets_ida',
      'join_key_rhs' => 'hat_assets_hat_asset_transhat_asset_trans_idb',
    ),
  ),
  'table' => 'hat_assets_hat_asset_trans_c',
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
      'name' => 'hat_assets_hat_asset_transhat_assets_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_assets_hat_asset_transhat_asset_trans_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_assets_hat_asset_transspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_assets_hat_asset_trans_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_assets_hat_asset_transhat_assets_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_assets_hat_asset_trans_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_assets_hat_asset_transhat_asset_trans_idb',
      ),
    ),
  ),
);