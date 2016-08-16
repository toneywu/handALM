<?php
// created: 2016-02-09 00:45:28
$dictionary["hpr_am_roles_contacts"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'hpr_am_roles_contacts' => 
    array (
      'lhs_module' => 'HPR_AM_Roles',
      'lhs_table' => 'hpr_am_roles',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hpr_am_roles_contacts_c',
      'join_key_lhs' => 'hpr_am_roles_contactshpr_am_roles_ida',
      'join_key_rhs' => 'hpr_am_roles_contactscontacts_idb',
    ),
  ),
  'table' => 'hpr_am_roles_contacts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'hpr_am_roles_contactshpr_am_roles_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hpr_am_roles_contactscontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hpr_am_roles_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hpr_am_roles_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hpr_am_roles_contactshpr_am_roles_ida',
        1 => 'hpr_am_roles_contactscontacts_idb',
      ),
    ),
  ),
);