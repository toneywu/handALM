<?php
// created: 2016-05-19 10:53:45
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_plantype"] = array (
  'name' => 'qa_collectionplan_qa_plantype',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_plantype',
  'source' => 'non-db',
  'module' => 'QA_PlanType',
  'bean_name' => 'QA_PlanType',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_PLANTYPE_FROM_QA_PLANTYPE_TITLE',
  'id_name' => 'qa_collectionplan_qa_plantypeqa_plantype_ida',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_plantype_name"] = array (
  'name' => 'qa_collectionplan_qa_plantype_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_PLANTYPE_FROM_QA_PLANTYPE_TITLE',
  'save' => true,
  'id_name' => 'qa_collectionplan_qa_plantypeqa_plantype_ida',
  'link' => 'qa_collectionplan_qa_plantype',
  'table' => 'qa_plantype',
  'module' => 'QA_PlanType',
  'rname' => 'name',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_qa_plantypeqa_plantype_ida"] = array (
  'name' => 'qa_collectionplan_qa_plantypeqa_plantype_ida',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_qa_plantype',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_COLLECTIONPLAN_QA_PLANTYPE_FROM_QA_COLLECTIONPLAN_TITLE',
);
