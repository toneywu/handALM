<?php
// created: 2016-02-08 00:23:22
$dictionary["HAT_Asset_Trans"]["fields"]["hat_assets_hat_asset_trans"] = array (
  'name' => 'hat_assets_hat_asset_trans',
  'type' => 'link',
  'relationship' => 'hat_assets_hat_asset_trans',
  'source' => 'non-db',
  'module' => 'HAT_Assets',
  'bean_name' => 'HAT_Assets',
  'vname' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE',
  'id_name' => 'hat_assets_hat_asset_transhat_assets_ida',
);
$dictionary["HAT_Asset_Trans"]["fields"]["hat_assets_hat_asset_trans_name"] = array (
  'name' => 'hat_assets_hat_asset_trans_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE',
  'save' => true,
  'id_name' => 'hat_assets_hat_asset_transhat_assets_ida',
  'link' => 'hat_assets_hat_asset_trans',
  'table' => 'hat_assets',
  'module' => 'HAT_Assets',
  'rname' => 'name',
);
$dictionary["HAT_Asset_Trans"]["fields"]["hat_assets_hat_asset_transhat_assets_ida"] = array (
  'name' => 'hat_assets_hat_asset_transhat_assets_ida',
  'type' => 'link',
  'relationship' => 'hat_assets_hat_asset_trans',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_TITLE',
);
