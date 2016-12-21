<?php
// created: 2016-12-21 10:11:54
$dictionary["hat_counting_lines_hat_counting_batchs"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_lines_hat_counting_batchs' => 
    array (
      'lhs_module' => 'HAT_Counting_Batchs',
      'lhs_table' => 'hat_counting_batchs',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Lines',
      'rhs_table' => 'hat_counting_lines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_lines_hat_counting_batchs_c',
      'join_key_lhs' => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
      'join_key_rhs' => 'hat_counting_lines_hat_counting_batchshat_counting_lines_idb',
    ),
  ),
  'table' => 'hat_counting_lines_hat_counting_batchs_c',
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
      'name' => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counting_lines_hat_counting_batchshat_counting_lines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_lines_hat_counting_batchsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_lines_hat_counting_batchs_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_lines_hat_counting_batchs_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counting_lines_hat_counting_batchshat_counting_lines_idb',
      ),
    ),
  ),
);