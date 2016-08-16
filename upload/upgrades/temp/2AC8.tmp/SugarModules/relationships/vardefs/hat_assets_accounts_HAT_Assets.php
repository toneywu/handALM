<?php
// created: 2016-02-08 07:53:03
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
