<?php
// created: 2016-05-19 10:53:43
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_haa_uom"] = array (
  'name' => 'qa_collectionplan_haa_uom',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_haa_uom',
  'source' => 'non-db',
  'module' => 'HAA_UOM',
  'bean_name' => 'HAA_UOM',
  'vname' => 'LBL_QA_COLLECTIONPLAN_HAA_UOM_FROM_HAA_UOM_TITLE',
  'id_name' => 'qa_collectionplan_haa_uomhaa_uom_ida',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_haa_uom_name"] = array (
  'name' => 'qa_collectionplan_haa_uom_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_QA_COLLECTIONPLAN_HAA_UOM_FROM_HAA_UOM_TITLE',
  'save' => true,
  'id_name' => 'qa_collectionplan_haa_uomhaa_uom_ida',
  'link' => 'qa_collectionplan_haa_uom',
  'table' => 'haa_uom',
  'module' => 'HAA_UOM',
  'rname' => 'name',
);
$dictionary["QA_CollectionPlan"]["fields"]["qa_collectionplan_haa_uomhaa_uom_ida"] = array (
  'name' => 'qa_collectionplan_haa_uomhaa_uom_ida',
  'type' => 'link',
  'relationship' => 'qa_collectionplan_haa_uom',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_QA_COLLECTIONPLAN_HAA_UOM_FROM_QA_COLLECTIONPLAN_TITLE',
);
