<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-07-13 10:30:09
$dictionary["HFA_FA_Value"]["fields"]["hfa_fixed_assets_hfa_fa_value"] = array (
  'name' => 'hfa_fixed_assets_hfa_fa_value',
  'type' => 'link',
  'relationship' => 'hfa_fixed_assets_hfa_fa_value',
  'source' => 'non-db',
  'module' => 'HFA_Fixed_Assets',
  'bean_name' => 'HFA_Fixed_Assets',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
  'id_name' => 'hfa_fixed_assets_hfa_fa_valuehfa_fixed_assets_ida',
);
$dictionary["HFA_FA_Value"]["fields"]["hfa_fixed_assets_hfa_fa_value_name"] = array (
  'name' => 'hfa_fixed_assets_hfa_fa_value_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FIXED_ASSETS_TITLE',
  'save' => true,
  'id_name' => 'hfa_fixed_assets_hfa_fa_valuehfa_fixed_assets_ida',
  'link' => 'hfa_fixed_assets_hfa_fa_value',
  'table' => 'hfa_fixed_assets',
  'module' => 'HFA_Fixed_Assets',
  'rname' => 'name',
);
$dictionary["HFA_FA_Value"]["fields"]["hfa_fixed_assets_hfa_fa_valuehfa_fixed_assets_ida"] = array (
  'name' => 'hfa_fixed_assets_hfa_fa_valuehfa_fixed_assets_ida',
  'type' => 'link',
  'relationship' => 'hfa_fixed_assets_hfa_fa_value',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_VALUE_FROM_HFA_FA_VALUE_TITLE',
);

?>