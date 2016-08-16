<?php
$module_name = 'QA_CollectionElement';
$listViewDefs [$module_name] = 
array (
  'QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_FROM_QA_ELEMENTTYPE_TITLE',
    'id' => 'QA_COLLECTIONELEMENT_QA_ELEMENTTYPEQA_ELEMENTTYPE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
);
?>
