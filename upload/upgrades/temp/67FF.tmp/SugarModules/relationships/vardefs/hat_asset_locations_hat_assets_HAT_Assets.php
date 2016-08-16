<?php
// created: 2016-02-07 23:28:10
$dictionary["HAT_Assets"]["fields"]["hat_asset_locations_hat_assets"] = array (
  'name' => 'hat_asset_locations_hat_assets',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_assets',
  'source' => 'non-db',
  'module' => 'HAT_Asset_Locations',
  'bean_name' => 'HAT_Asset_Locations',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSET_LOCATIONS_TITLE',
  'id_name' => 'hat_asset_locations_hat_assetshat_asset_locations_ida',
);
$dictionary["HAT_Assets"]["fields"]["hat_asset_locations_hat_assets_name"] = array (
  'name' => 'hat_asset_locations_hat_assets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSET_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'hat_asset_locations_hat_assetshat_asset_locations_ida',
  'link' => 'hat_asset_locations_hat_assets',
  'table' => 'hat_asset_locations',
  'module' => 'HAT_Asset_Locations',
  'rname' => 'name',
);
$dictionary["HAT_Assets"]["fields"]["hat_asset_locations_hat_assetshat_asset_locations_ida"] = array (
  'name' => 'hat_asset_locations_hat_assetshat_asset_locations_ida',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_assets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
);
