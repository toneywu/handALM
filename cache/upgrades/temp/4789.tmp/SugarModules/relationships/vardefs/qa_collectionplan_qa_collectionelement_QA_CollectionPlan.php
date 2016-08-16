<?php
// created: 2016-05-19 10:53:43
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_collectionelement"] = array (
  'name' => 'qa_collectionplan_qa_collectionelement',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_collectionelement',
  'source' => 'non-db',
  'module' => 'QA_CollectionElement',
  'bean_name' => 'QA_CollectionElement',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONELEMENT_TITLE',
  'id_name' => 'qa_collectionplan_qa_collectionelementqa_collectionelement_ida',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_collectionelement_name"] = array (
  'name' => 'qa_collectionplan_qa_collectionelement_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONELEMENT_TITLE',
  'save' => true,
  'id_name' => 'qa_collectionplan_qa_collectionelementqa_collectionelement_ida',
  'link' => 'qa_collectionplan_qa_collectionelement',
  'table' => 'qa_collectionelement',
  'module' => 'QA_CollectionElement',
  'rname' => 'name',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_collectionelementqa_collectionelement_ida"] = array (
  'name' => 'qa_collectionplan_qa_collectionelementqa_collectionelement_ida',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_collectionelement',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONPLAN_TITLE',
);
