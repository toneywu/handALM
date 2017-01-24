<?php
// created: 2017-01-24 17:29:10
$dictionary["haa_integration_system_def_headers_haa_integration_system_def_lines"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'haa_integration_system_def_headers_haa_integration_system_def_lines' => 
    array (
      'lhs_module' => 'HAA_Integration_System_Def_Headers',
      'lhs_table' => 'haa_integration_system_def_headers',
      'lhs_key' => 'id',
      'rhs_module' => 'HAA_Integration_System_Def_Lines',
      'rhs_table' => 'haa_integration_system_def_lines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'haa_integrbaeddef_lines_c',
      'join_key_lhs' => 'haa_integrc471headers_ida',
      'join_key_rhs' => 'haa_integrd80ef_lines_idb',
    ),
  ),
  'table' => 'haa_integrbaeddef_lines_c',
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
      'name' => 'haa_integrc471headers_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'haa_integrd80ef_lines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'haa_integr7f04m_def_linesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'haa_integr7f04m_def_lines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'haa_integrc471headers_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'haa_integr7f04m_def_lines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'haa_integrd80ef_lines_idb',
      ),
    ),
  ),
);