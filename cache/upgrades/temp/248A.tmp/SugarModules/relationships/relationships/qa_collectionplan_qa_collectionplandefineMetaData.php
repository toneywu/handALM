<?php
// created: 2016-05-19 10:53:43
$dictionary["qa_collectionplan_qa_collectionplandefine"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'qa_collectionplan_qa_collectionplandefine' => 
    array (
      'lhs_module' => 'QA_CollectionPlanDefine',
      'lhs_table' => 'qa_collectionplandefine',
      'lhs_key' => 'id',
      'rhs_module' => 'QA_CollectionPlan',
      'rhs_table' => 'qa_collectionplan',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'qa_collectionplan_qa_collectionplandefine_c',
      'join_key_lhs' => 'qa_collectf3c4ndefine_ida',
      'join_key_rhs' => 'qa_collectionplan_qa_collectionplandefineqa_collectionplan_idb',
    ),
  ),
  'table' => 'qa_collectionplan_qa_collectionplandefine_c',
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
      'name' => 'qa_collectf3c4ndefine_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'qa_collectionplan_qa_collectionplandefineqa_collectionplan_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'qa_collectionplan_qa_collectionplandefinespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'qa_collectionplan_qa_collectionplandefine_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'qa_collectf3c4ndefine_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'qa_collectionplan_qa_collectionplandefine_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'qa_collectionplan_qa_collectionplandefineqa_collectionplan_idb',
      ),
    ),
  ),
);