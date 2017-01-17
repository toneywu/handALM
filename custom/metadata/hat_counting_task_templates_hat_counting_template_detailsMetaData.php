<?php
// created: 2017-01-15 21:32:22
$dictionary["hat_counting_task_templates_hat_counting_template_details"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'hat_counting_task_templates_hat_counting_template_details' => 
    array (
      'lhs_module' => 'HAT_Counting_Task_Templates',
      'lhs_table' => 'hat_counting_task_templates',
      'lhs_key' => 'id',
      'rhs_module' => 'HAT_Counting_Template_Details',
      'rhs_table' => 'hat_counting_template_details',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_task_templates_hat_counting_template_details_c',
      'join_key_lhs' => 'hat_countid917mplates_ida',
      'join_key_rhs' => 'hat_countib27cdetails_idb',
    ),
  ),
  'table' => 'hat_counting_task_templates_hat_counting_template_details_c',
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
      'name' => 'hat_countid917mplates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_countib27cdetails_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'hat_counting_task_templates_hat_counting_template_detailsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_task_templates_hat_counting_template_details_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'hat_countid917mplates_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'hat_counting_task_templates_hat_counting_template_details_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_countib27cdetails_idb',
      ),
    ),
  ),
);