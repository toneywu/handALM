<?php
// created: 2016-12-21 10:11:54
$dictionary["hat_counting_lines_documents"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'hat_counting_lines_documents' => 
    array (
      'lhs_module' => 'HAT_Counting_Lines',
      'lhs_table' => 'hat_counting_lines',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'hat_counting_lines_documents_c',
      'join_key_lhs' => 'hat_counting_lines_documentshat_counting_lines_ida',
      'join_key_rhs' => 'hat_counting_lines_documentsdocuments_idb',
    ),
  ),
  'table' => 'hat_counting_lines_documents_c',
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
      'name' => 'hat_counting_lines_documentshat_counting_lines_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'hat_counting_lines_documentsdocuments_idb',
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
      'name' => 'hat_counting_lines_documentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'hat_counting_lines_documents_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'hat_counting_lines_documentshat_counting_lines_ida',
        1 => 'hat_counting_lines_documentsdocuments_idb',
      ),
    ),
  ),
);