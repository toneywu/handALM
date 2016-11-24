<?php
// created: 2016-11-22 18:14:21
$dictionary["haos_insurance_claims_haos_insurance_claims_lines"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'haos_insurance_claims_haos_insurance_claims_lines' => 
    array (
      'lhs_module' => 'HAOS_Insurance_Claims',
      'lhs_table' => 'haos_insurance_claims',
      'lhs_key' => 'id',
      'rhs_module' => 'HAOS_Insurance_Claims_Lines',
      'rhs_table' => 'haos_insurance_claims_lines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'haos_insurance_claims_haos_insurance_claims_lines_c',
      'join_key_lhs' => 'haos_insurefcc_claims_ida',
      'join_key_rhs' => 'haos_insurf06es_lines_idb',
    ),
  ),
  'table' => 'haos_insurance_claims_haos_insurance_claims_lines_c',
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
      'name' => 'haos_insurefcc_claims_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'haos_insurf06es_lines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'haos_insurance_claims_haos_insurance_claims_linesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'haos_insurance_claims_haos_insurance_claims_lines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'haos_insurefcc_claims_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'haos_insurance_claims_haos_insurance_claims_lines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'haos_insurf06es_lines_idb',
      ),
    ),
  ),
);