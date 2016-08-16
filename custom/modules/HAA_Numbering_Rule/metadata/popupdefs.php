<?php
$popupMeta = array (
  'moduleMain' => 'HAA_Numbering_Rule',
  'varName' => 'HAA_Numbering_Rule',
  'orderBy' => 'haa_numbering_rule.name',
  'whereClauses' => array (
    'name' => 'haa_numbering_rule.name',
    'document_type' => 'haa_numbering_rule.document_type',
    ),
  'searchInputs' => array (
    1 => 'name',
  //4 => 'document_type',
    ),
  'searchdefs' => array (
    'name' => 
    array (
      'name' => 'name',
      'width' => '10%',
      ),
    'document_type' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'label' => 'LBL_DOCUMENT_TYPE',
      'width' => '10%',
      'name' => 'document_type',
      'display'=>'hidden',
      ),
    ),
  );
