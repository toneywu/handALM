<?php
// created: 2017-01-15 21:32:18
$dictionary["hat_counting_policy_groups_hat_counting_policies"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_policy_groups_hat_counting_policies' => 
    array (
      'lhs_module' => 'HAT_Counting_Policy_Groups',
      'lhs_table' => 'hat_counting_policy_groups',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Policies',
      'rhs_table' => 'hat_counting_policies',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_policy_groups_hat_counting_policies_c',
      'join_key_lhs' => 'hat_counti1658_groups_ida',
      'join_key_rhs' => 'hat_counti9da1olicies_idb',
    ),
  ),
  'table' => 'hat_counting_policy_groups_hat_counting_policies_c',
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
      'name' => 'hat_counti1658_groups_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counti9da1olicies_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_policy_groups_hat_counting_policiesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_policy_groups_hat_counting_policies_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counti1658_groups_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_policy_groups_hat_counting_policies_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counti9da1olicies_idb',
      ),
    ),
  ),
);