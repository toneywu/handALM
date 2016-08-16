<?php
// created: 2016-05-19 10:53:50
$dictionary["qa_inputresult_qa_collectionplan"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'qa_inputresult_qa_collectionplan' => 
    array (
      'lhs_module' => 'QA_CollectionPlan',
      'lhs_table' => 'qa_collectionplan',
      'lhs_key' => 'id',
      'rhs_module' => 'QA_inputresult',
      'rhs_table' => 'qa_inputresult',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'qa_inputresult_qa_collectionplan_c',
      'join_key_lhs' => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
      'join_key_rhs' => 'qa_inputresult_qa_collectionplanqa_inputresult_idb',
    ),
  ),
  'table' => 'qa_inputresult_qa_collectionplan_c',
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
      'name' => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'qa_inputresult_qa_collectionplanqa_inputresult_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'qa_inputresult_qa_collectionplanspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'qa_inputresult_qa_collectionplan_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'qa_inputresult_qa_collectionplan_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'qa_inputresult_qa_collectionplanqa_inputresult_idb',
      ),
    ),
  ),
);