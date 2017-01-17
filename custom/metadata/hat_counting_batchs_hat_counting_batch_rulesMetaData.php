<?php
// created: 2017-01-15 21:32:14
$dictionary["hat_counting_batchs_hat_counting_batch_rules"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_batchs_hat_counting_batch_rules' => 
    array (
      'lhs_module' => 'HAT_Counting_Batchs',
      'lhs_table' => 'hat_counting_batchs',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Batch_Rules',
      'rhs_table' => 'hat_counting_batch_rules',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_batchs_hat_counting_batch_rules_c',
      'join_key_lhs' => 'hat_counti9a14_batchs_ida',
      'join_key_rhs' => 'hat_counti8f01h_rules_idb',
    ),
  ),
  'table' => 'hat_counting_batchs_hat_counting_batch_rules_c',
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
      'name' => 'hat_counti9a14_batchs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counti8f01h_rules_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_batchs_hat_counting_batch_rulesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_batchs_hat_counting_batch_rules_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counti9a14_batchs_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_batchs_hat_counting_batch_rules_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counti8f01h_rules_idb',
      ),
    ),
  ),
);