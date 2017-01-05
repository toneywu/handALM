<?php
// created: 2017-01-04 17:45:36
$dictionary["haa_interfaces_haa_interface_logs"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'haa_interfaces_haa_interface_logs' => 
    array (
      'lhs_module' => 'HAA_Interfaces',
      'lhs_table' => 'haa_interfaces',
      'lhs_key' => 'id',
      'rhs_module' => 'HAA_Interface_Logs',
      'rhs_table' => 'haa_interface_logs',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'haa_interfaces_haa_interface_logs_c',
      'join_key_lhs' => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
      'join_key_rhs' => 'haa_interfaces_haa_interface_logshaa_interface_logs_idb',
    ),
  ),
  'table' => 'haa_interfaces_haa_interface_logs_c',
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
      'name' => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'haa_interfaces_haa_interface_logshaa_interface_logs_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'haa_interfaces_haa_interface_logsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'haa_interfaces_haa_interface_logs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'haa_interfaces_haa_interface_logs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'haa_interfaces_haa_interface_logshaa_interface_logs_idb',
      ),
    ),
  ),
);