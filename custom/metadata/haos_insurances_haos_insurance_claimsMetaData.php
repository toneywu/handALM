<?php
// created: 2016-11-22 18:14:18
$dictionary["haos_insurances_haos_insurance_claims"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'haos_insurances_haos_insurance_claims' => 
    array (
      'lhs_module' => 'HAOS_Insurances',
      'lhs_table' => 'haos_insurances',
      'lhs_key' => 'id',
      'rhs_module' => 'HAOS_Insurance_Claims',
      'rhs_table' => 'haos_insurance_claims',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'haos_insurances_haos_insurance_claims_c',
      'join_key_lhs' => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
      'join_key_rhs' => 'haos_insurances_haos_insurance_claimshaos_insurance_claims_idb',
    ),
  ),
  'table' => 'haos_insurances_haos_insurance_claims_c',
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
      'name' => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'haos_insurances_haos_insurance_claimshaos_insurance_claims_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'haos_insurances_haos_insurance_claimsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'haos_insurances_haos_insurance_claims_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'haos_insurances_haos_insurance_claims_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'haos_insurances_haos_insurance_claimshaos_insurance_claims_idb',
      ),
    ),
  ),
);