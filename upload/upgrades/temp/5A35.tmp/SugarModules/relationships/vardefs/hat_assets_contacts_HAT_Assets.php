<?php
// created: 2016-02-07 23:38:50
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
