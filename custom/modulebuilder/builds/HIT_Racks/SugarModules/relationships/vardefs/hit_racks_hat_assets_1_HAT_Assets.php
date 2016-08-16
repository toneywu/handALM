<?php
// created: 2016-04-26 22:35:53
$dictionary["HAT_Assets"]["fields"]["hit_racks_hat_assets_1"] = array (
  'name' => 'hit_racks_hat_assets_1',
  'type' => 'link',
  'relationship' => 'hit_racks_hat_assets_1',
  'source' => 'non-db',
  'module' => 'HIT_Racks',
  'bean_name' => false,
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_1_FROM_HIT_RACKS_TITLE',
  'id_name' => 'hit_racks_hat_assets_1hit_racks_ida',
);
$dictionary["HAT_Assets"]["fields"]["hit_racks_hat_assets_1_name"] = array (
  'name' => 'hit_racks_hat_assets_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_1_FROM_HIT_RACKS_TITLE',
  'save' => true,
  'id_name' => 'hit_racks_hat_assets_1hit_racks_ida',
  'link' => 'hit_racks_hat_assets_1',
  'table' => 'hit_racks',
  'module' => 'HIT_Racks',
  'rname' => 'name',
);
$dictionary["HAT_Assets"]["fields"]["hit_racks_hat_assets_1hit_racks_ida"] = array (
  'name' => 'hit_racks_hat_assets_1hit_racks_ida',
  'type' => 'link',
  'relationship' => 'hit_racks_hat_assets_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HIT_RACKS_HAT_ASSETS_1_FROM_HAT_ASSETS_TITLE',
);
