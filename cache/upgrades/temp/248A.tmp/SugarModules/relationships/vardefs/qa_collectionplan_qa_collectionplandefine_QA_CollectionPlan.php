<?php
// created: 2016-05-19 10:53:44
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_collectionplandefine"] = array (
  'name' => 'qa_collectionplan_qa_collectionplandefine',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_collectionplandefine',
  'source' => 'non-db',
  'module' => 'QA_CollectionPlanDefine',
  'bean_name' => 'QA_CollectionPlanDefine',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLANDEFINE_TITLE',
  'id_name' => 'qa_collectf3c4ndefine_ida',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_collectionplandefine_name"] = array (
  'name' => 'qa_collectionplan_qa_collectionplandefine_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLANDEFINE_TITLE',
  'save' => true,
  'id_name' => 'qa_collectf3c4ndefine_ida',
  'link' => 'qa_collectionplan_qa_collectionplandefine',
  'table' => 'qa_collectionplandefine',
  'module' => 'QA_CollectionPlanDefine',
  'rname' => 'name',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectf3c4ndefine_ida"] = array (
  'name' => 'qa_collectf3c4ndefine_ida',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_collectionplandefine',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLAN_TITLE',
);
