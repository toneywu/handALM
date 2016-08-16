<?php
$module_name = 'HAA_Numbering_Rule';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DOCUMENT_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_DOCUMENT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'NEXTVAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NEXTVAL',
    'width' => '10%',
    'default' => true,
  ),
);
?>
