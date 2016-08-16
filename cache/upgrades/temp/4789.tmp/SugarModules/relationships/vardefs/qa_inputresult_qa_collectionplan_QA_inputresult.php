<?php
// created: 2016-05-19 10:53:50
$dictionary["QA_inputresult"]["fields"]["qa_inputresult_qa_collectionplan"] = array (
  'name' => 'qa_inputresult_qa_collectionplan',
  'type' => 'link',
  'relationship' => 'qa_inputresult_qa_collectionplan',
  'source' => 'non-db',
  'module' => 'QA_CollectionPlan',
  'bean_name' => 'QA_CollectionPlan',
  'vname' => 'LBL_QA_INPUTRESULT_QA_COLLECTIONPLAN_FROM_QA_COLLECTIONPLAN_TITLE',
  'id_name' => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
);
$dictionary["QA_inputresult"]["fields"]["qa_inputresult_qa_collectionplan_name"] = array (
  'name' => 'qa_inputresult_qa_collectionplan_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_INPUTRESULT_QA_COLLECTIONPLAN_FROM_QA_COLLECTIONPLAN_TITLE',
  'save' => true,
  'id_name' => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
  'link' => 'qa_inputresult_qa_collectionplan',
  'table' => 'qa_collectionplan',
  'module' => 'QA_CollectionPlan',
  'rname' => 'name',
);
$dictionary["QA_inputresult"]["fields"]["qa_inputresult_qa_collectionplanqa_collectionplan_ida"] = array (
  'name' => 'qa_inputresult_qa_collectionplanqa_collectionplan_ida',
  'type' => 'link',
  'relationship' => 'qa_inputresult_qa_collectionplan',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_INPUTRESULT_QA_COLLECTIONPLAN_FROM_QA_INPUTRESULT_TITLE',
);
