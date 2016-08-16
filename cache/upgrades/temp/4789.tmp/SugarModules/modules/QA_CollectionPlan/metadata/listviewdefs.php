<?php
$module_name = 'QA_CollectionPlan';
$listViewDefs [$module_name] = 
array (
  'QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLANDEFINE_TITLE',
    'id' => 'QA_COLLECTF3C4NDEFINE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONELEMENT_TITLE',
    'id' => 'QA_COLLECTIONPLAN_QA_COLLECTIONELEMENTQA_COLLECTIONELEMENT_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DEFAULTDATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DEFAULTDATE',
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
