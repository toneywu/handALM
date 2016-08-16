<?php
// created: 2016-02-07 23:28:10
$dictionary["hat_asset_locations_hat_asset_locations"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_asset_locations_hat_asset_locations' => 
    array (
      'lhs_module' => 'HAT_Asset_Locations',
      'lhs_table' => 'hat_asset_locations',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Asset_Locations',
      'rhs_table' => 'hat_asset_locations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_asset_locations_hat_asset_locations_c',
      'join_key_lhs' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
      'join_key_rhs' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_idb',
    ),
  ),
  'table' => 'hat_asset_locations_hat_asset_locations_c',
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
      'name' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_asset_locations_hat_asset_locationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_asset_locations_hat_asset_locations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_asset_locations_hat_asset_locations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_asset_locations_hat_asset_locationshat_asset_locations_idb',
      ),
    ),
  ),
);