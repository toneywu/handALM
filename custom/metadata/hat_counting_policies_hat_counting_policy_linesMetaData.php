<?php
// created: 2017-01-15 21:32:17
$dictionary["hat_counting_policies_hat_counting_policy_lines"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_policies_hat_counting_policy_lines' => 
    array (
      'lhs_module' => 'HAT_Counting_Policies',
      'lhs_table' => 'hat_counting_policies',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Policy_Lines',
      'rhs_table' => 'hat_counting_policy_lines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_policies_hat_counting_policy_lines_c',
      'join_key_lhs' => 'hat_counti5649olicies_ida',
      'join_key_rhs' => 'hat_countifea6y_lines_idb',
    ),
  ),
  'table' => 'hat_counting_policies_hat_counting_policy_lines_c',
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
      'name' => 'hat_counti5649olicies_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_countifea6y_lines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_policies_hat_counting_policy_linesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_policies_hat_counting_policy_lines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counti5649olicies_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_policies_hat_counting_policy_lines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_countifea6y_lines_idb',
      ),
    ),
  ),
);