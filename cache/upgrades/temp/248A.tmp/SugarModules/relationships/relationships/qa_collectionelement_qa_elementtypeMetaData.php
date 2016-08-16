<?php
// created: 2016-05-19 10:53:39
$dictionary["qa_collectionelement_qa_elementtype"] = array (
  'true_relationship_type' => 'one-to-many',
  'relationships' => 
  array (
    'qa_collectionelement_qa_elementtype' => 
    array (
      'lhs_module' => 'QA_ElementType',
      'lhs_table' => 'qa_elementtype',
      'lhs_key' => 'id',
      'rhs_module' => 'QA_CollectionElement',
      'rhs_table' => 'qa_collectionelement',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'qa_collectionelement_qa_elementtype_c',
      'join_key_lhs' => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
      'join_key_rhs' => 'qa_collectionelement_qa_elementtypeqa_collectionelement_idb',
    ),
  ),
  'table' => 'qa_collectionelement_qa_elementtype_c',
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
      'name' => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'qa_collectionelement_qa_elementtypeqa_collectionelement_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'qa_collectionelement_qa_elementtypespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'qa_collectionelement_qa_elementtype_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'qa_collectionelement_qa_elementtype_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'qa_collectionelement_qa_elementtypeqa_collectionelement_idb',
      ),
    ),
  ),
);