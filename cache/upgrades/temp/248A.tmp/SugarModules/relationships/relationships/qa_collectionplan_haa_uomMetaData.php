<?php
// created: 2016-05-19 10:53:43
$dictionary["qa_collectionplan_haa_uom"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'qa_collectionplan_haa_uom' => 
    array (
      'lhs_module' => 'HAA_UOM',
      'lhs_table' => 'haa_uom',
      'lhs_key' => 'id',
      'rhs_module' => 'QA_CollectionPlan',
      'rhs_table' => 'qa_collectionplan',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'qa_collectionplan_haa_uom_c',
      'join_key_lhs' => 'qa_collectionplan_haa_uomhaa_uom_ida',
      'join_key_rhs' => 'qa_collectionplan_haa_uomqa_collectionplan_idb',
    ),
  ),
  'table' => 'qa_collectionplan_haa_uom_c',
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
      'name' => 'qa_collectionplan_haa_uomhaa_uom_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'qa_collectionplan_haa_uomqa_collectionplan_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'qa_collectionplan_haa_uomspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'qa_collectionplan_haa_uom_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'qa_collectionplan_haa_uomhaa_uom_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'qa_collectionplan_haa_uom_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'qa_collectionplan_haa_uomqa_collectionplan_idb',
      ),
    ),
  ),
);