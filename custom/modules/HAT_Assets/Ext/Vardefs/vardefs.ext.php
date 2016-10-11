<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-02-08 10:53:31
$dictionary["HAT_Assets"]["fields"]["hat_assets_accounts"] = array (
  'name' => 'hat_assets_accounts',
  'type' => 'link',
  'relationship' => 'hat_assets_accounts',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'id_name' => 'hat_assets_accountsaccounts_ida',
);
$dictionary["HAT_Assets"]["fields"]["hat_assets_accounts_name"] = array (
  'name' => 'hat_assets_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'hat_assets_accountsaccounts_ida',
  'link' => 'hat_assets_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["HAT_Assets"]["fields"]["hat_assets_accountsaccounts_ida"] = array (
  'name' => 'hat_assets_accountsaccounts_ida',
  'type' => 'link',
  'relationship' => 'hat_assets_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_HAT_ASSETS_TITLE',
);


// created: 2016-02-08 10:53:31
$dictionary["HAT_Assets"]["fields"]["hat_assets_contacts"] = array (
  'name' => 'hat_assets_contacts',
  'type' => 'link',
  'relationship' => 'hat_assets_contacts',
  'source' => 'non-db',
  'module' => 'Contacts',
  'bean_name' => 'Contact',
  'vname' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
  'id_name' => 'hat_assets_contactscontacts_ida',
);
$dictionary["HAT_Assets"]["fields"]["hat_assets_contacts_name"] = array (
  'name' => 'hat_assets_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'hat_assets_contactscontacts_ida',
  'link' => 'hat_assets_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["HAT_Assets"]["fields"]["hat_assets_contactscontacts_ida"] = array (
  'name' => 'hat_assets_contactscontacts_ida',
  'type' => 'link',
  'relationship' => 'hat_assets_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSETS_CONTACTS_FROM_HAT_ASSETS_TITLE',
);


// created: 2016-02-08 10:53:31
$dictionary["HAT_Assets"]["fields"]["hat_assets_hat_asset_trans"] = array (
  'name' => 'hat_assets_hat_asset_trans',
  'type' => 'link',
  'relationship' => 'hat_assets_hat_asset_trans',
  'source' => 'non-db',
  'module' => 'HAT_Asset_Trans',
  'bean_name' => 'HAT_Asset_Trans',
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_TITLE',
);


// created: 2016-02-08 10:53:31
$dictionary["HAT_Assets"]["fields"]["hat_asset_locations_hat_assets"] = array (
  'name' => 'hat_asset_locations_hat_assets',
  'type' => 'link',
  'relationship' => 'hat_asset_locations_hat_assets',
  'source' => 'non-db',
  'module' => 'HAT_Asset_Locations',
  'bean_name' => 'HAT_Asset_Locations',
  'vname' => 'LBL_LOCATION',
  'id_name' => 'hat_asset_locations_hat_assetshat_asset_locations_ida',
);
$dictionary["HAT_Assets"]["fields"]["hat_asset_locations_hat_assets_name"] = array (
  'name' => 'hat_asset_locations_hat_assets_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LOCATION',
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

?>