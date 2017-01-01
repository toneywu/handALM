<?php
// created: 2016-12-30 23:34:15
$dictionary["ham_wo_documents"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'ham_wo_documents' => 
    array (
      'lhs_module' => 'HAM_WO',
      'lhs_table' => 'ham_wo',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'ham_wo_documents_c',
      'join_key_lhs' => 'ham_wo_documentsham_wo_ida',
      'join_key_rhs' => 'ham_wo_documentsdocuments_idb',
    ),
  ),
  'table' => 'ham_wo_documents_c',
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
      'name' => 'ham_wo_documentsham_wo_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'ham_wo_documentsdocuments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 => 
    array (
      'name' => 'document_revision_id',
      'type' => 'varchar',
      'len' => '36',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'ham_wo_documentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'ham_wo_documents_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'ham_wo_documentsham_wo_ida',
        1 => 'ham_wo_documentsdocuments_idb',
      ),
    ),
  ),
);