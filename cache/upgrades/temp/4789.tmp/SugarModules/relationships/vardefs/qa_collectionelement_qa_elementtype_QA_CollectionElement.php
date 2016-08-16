<?php
// created: 2016-05-19 10:53:40
$dictionary["QA_CollectionElement"]["fields"]["qa_collectionelement_qa_elementtype"] = array (
  'name' => 'qa_collectionelement_qa_elementtype',
  'type' => 'link',
  'relationship' => 'qa_collectionelement_qa_elementtype',
  'source' => 'non-db',
  'module' => 'QA_ElementType',
  'bean_name' => 'QA_ElementType',
  'vname' => 'LBL_QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_FROM_QA_ELEMENTTYPE_TITLE',
  'id_name' => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
);
$dictionary["QA_CollectionElement"]["fields"]["qa_collectionelement_qa_elementtype_name"] = array (
  'name' => 'qa_collectionelement_qa_elementtype_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_FROM_QA_ELEMENTTYPE_TITLE',
  'save' => true,
  'id_name' => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
  'link' => 'qa_collectionelement_qa_elementtype',
  'table' => 'qa_elementtype',
  'module' => 'QA_ElementType',
  'rname' => 'name',
);
$dictionary["QA_CollectionElement"]["fields"]["qa_collectionelement_qa_elementtypeqa_elementtype_ida"] = array (
  'name' => 'qa_collectionelement_qa_elementtypeqa_elementtype_ida',
  'type' => 'link',
  'relationship' => 'qa_collectionelement_qa_elementtype',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_COLLECTIONELEMENT_QA_ELEMENTTYPE_FROM_QA_COLLECTIONELEMENT_TITLE',
);
