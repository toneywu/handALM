<?php
// created: 2016-03-03 09:32:24
$dictionary["HAM_SR"]["fields"]["ham_sr_hat_assets"] = array (
  'name' => 'ham_sr_hat_assets',
  'type' => 'link',
  'relationship' => 'ham_sr_hat_assets',
  'source' => 'non-db',
  'module' => 'HAT_Assets',
  'bean_name' => 'HAT_Assets',
  'vname' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
  'id_name' => 'ham_sr_hat_assetshat_assets_ida',
);
$dictionary["HAM_SR"]["fields"]["ham_sr_hat_assets_name"] = array (
  'name' => 'ham_sr_hat_assets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
  'save' => true,
  'id_name' => 'ham_sr_hat_assetshat_assets_ida',
  'link' => 'ham_sr_hat_assets',
  'table' => 'hat_assets',
  'module' => 'HAT_Assets',
  'rname' => 'name',
);
$dictionary["HAM_SR"]["fields"]["ham_sr_hat_assetshat_assets_ida"] = array (
  'name' => 'ham_sr_hat_assetshat_assets_ida',
  'type' => 'link',
  'relationship' => 'ham_sr_hat_assets',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAM_SR_TITLE',
);
