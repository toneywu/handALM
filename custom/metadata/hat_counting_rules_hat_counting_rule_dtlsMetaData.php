<?php
// created: 2016-12-24 15:08:40
$dictionary["hat_counting_rules_hat_counting_rule_dtls"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_rules_hat_counting_rule_dtls' => 
    array (
      'lhs_module' => 'HAT_Counting_Rules',
      'lhs_table' => 'hat_counting_rules',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Rule_Dtls',
      'rhs_table' => 'hat_counting_rule_dtls',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_rules_hat_counting_rule_dtls_c',
      'join_key_lhs' => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
      'join_key_rhs' => 'hat_counti3fa2le_dtls_idb',
    ),
  ),
  'table' => 'hat_counting_rules_hat_counting_rule_dtls_c',
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
      'name' => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counti3fa2le_dtls_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_rules_hat_counting_rule_dtlsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_rules_hat_counting_rule_dtls_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_rules_hat_counting_rule_dtls_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counti3fa2le_dtls_idb',
      ),
    ),
  ),
);