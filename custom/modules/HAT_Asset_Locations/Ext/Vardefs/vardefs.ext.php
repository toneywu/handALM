<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-12-07 15:28:51
$dictionary["HAT_Asset_Locations"]["fields"]["hat_asset_locations_hat_assets"] = array (
  'name' => 'hat_asset_locations_hat_assets',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_assets',
  'source' => 'non-db',
  'module' => 'HAT_Assets',
  'bean_name' => 'HAT_Assets',
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
);


// created: 2016-12-07 15:28:51
$dictionary["HAT_Asset_Locations"]["fields"]["hat_asset_locations_hat_asset_locations"]=array (
  'name' => 'hat_asset_locations_hat_asset_locations',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_asset_locations',
  'source' => 'non-db',
  'module' => 'HAT_Asset_Locations',
  'bean_name' => 'HAT_Asset_Locations',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSET_LOCATIONS_FROM_HAT_ASSET_LOCATIONS_L_TITLE',
  'id_name' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
  'side' => 'left',
);
$dictionary["HAT_Asset_Locations"]["fields"]["hat_asset_locations_hat_asset_locations_name"] = array (
  'name' => 'hat_asset_locations_hat_asset_locations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSET_LOCATIONS_FROM_HAT_ASSET_LOCATIONS_L_TITLE',
  'save' => true,
  'id_name' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
  'link' => 'hat_asset_locations_hat_asset_locations',
  'table' => 'hat_asset_locations',
  'module' => 'HAT_Asset_Locations',
  'rname' => 'name',
);
$dictionary["HAT_Asset_Locations"]["fields"]["hat_asset_locations_hat_asset_locationshat_asset_locations_ida"] = array (
  'name' => 'hat_asset_locations_hat_asset_locationshat_asset_locations_ida',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_asset_locations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSET_LOCATIONS_FROM_HAT_ASSET_LOCATIONS_R_TITLE',
);


 // created: 2016-03-23 16:11:30
$dictionary['HAT_Asset_Locations']['fields']['map_type']['default']='NONE';
$dictionary['HAT_Asset_Locations']['fields']['map_type']['required']=true;

 
?>