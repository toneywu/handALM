<?php
// created: 2017-01-15 21:32:21
$dictionary["hat_counting_tasks_hat_counting_lines"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_tasks_hat_counting_lines' => 
    array (
      'lhs_module' => 'HAT_Counting_Tasks',
      'lhs_table' => 'hat_counting_tasks',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Lines',
      'rhs_table' => 'hat_counting_lines',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_tasks_hat_counting_lines_c',
      'join_key_lhs' => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
      'join_key_rhs' => 'hat_counting_tasks_hat_counting_lineshat_counting_lines_idb',
    ),
  ),
  'table' => 'hat_counting_tasks_hat_counting_lines_c',
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
      'name' => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counting_tasks_hat_counting_lineshat_counting_lines_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_tasks_hat_counting_linesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_tasks_hat_counting_lines_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_tasks_hat_counting_lines_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counting_tasks_hat_counting_lineshat_counting_lines_idb',
      ),
    ),
  ),
);