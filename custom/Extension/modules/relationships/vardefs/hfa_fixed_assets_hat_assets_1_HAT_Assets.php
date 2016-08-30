<?php
// created: 2016-08-28 23:51:58
$dictionary["HAT_Assets"]["fields"]["hfa_fixed_assets_hat_assets_1"] = array (
  'name' => 'hfa_fixed_assets_hat_assets_1',
  'type' => 'link',
  'relationship' => 'hfa_fixed_assets_hat_assets_1',
  'source' => 'non-db',
  'module' => 'HFA_Fixed_Assets',
  'bean_name' => 'HFA_Fixed_Assets',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HAT_ASSETS_1_FROM_HFA_FIXED_ASSETS_TITLE',
  'id_name' => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
);
$dictionary["HAT_Assets"]["fields"]["hfa_fixed_assets_hat_assets_1_name"] = array (
  'name' => 'hfa_fixed_assets_hat_assets_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HAT_ASSETS_1_FROM_HFA_FIXED_ASSETS_TITLE',
  'save' => true,
  'id_name' => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
  'link' => 'hfa_fixed_assets_hat_assets_1',
  'table' => 'hfa_fixed_assets',
  'module' => 'HFA_Fixed_Assets',
  'rname' => 'name',
);
$dictionary["HAT_Assets"]["fields"]["hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida"] = array (
  'name' => 'hfa_fixed_assets_hat_assets_1hfa_fixed_assets_ida',
  'type' => 'link',
  'relationship' => 'hfa_fixed_assets_hat_assets_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HAT_ASSETS_1_FROM_HAT_ASSETS_TITLE',
);
