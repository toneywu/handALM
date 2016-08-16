<?php
// created: 2016-04-26 22:35:53
$dictionary["HIT_Racks"]["fields"]["hit_racks_hat_assets"] = array (
  'name' => 'hit_racks_hat_assets',
  'type' => 'link',
  'relationship' => 'hit_racks_hat_assets',
  'source' => 'non-db',
  'module' => 'HAT_Assets',
  'bean_name' => 'HAT_Assets',
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
  'id_name' => 'hit_racks_hat_assetshat_assets_idb',
);
$dictionary["HIT_Racks"]["fields"]["hit_racks_hat_assets_name"] = array (
  'name' => 'hit_racks_hat_assets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
  'save' => true,
  'id_name' => 'hit_racks_hat_assetshat_assets_idb',
  'link' => 'hit_racks_hat_assets',
  'table' => 'hat_assets',
  'module' => 'HAT_Assets',
  'rname' => 'name',
);
$dictionary["HIT_Racks"]["fields"]["hit_racks_hat_assetshat_assets_idb"] = array (
  'name' => 'hit_racks_hat_assetshat_assets_idb',
  'type' => 'link',
  'relationship' => 'hit_racks_hat_assets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
);
