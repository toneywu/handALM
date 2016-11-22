<?php
// created: 2016-11-22 18:14:18
$dictionary["Document"]["fields"]["haos_insurances_documents"] = array (
  'name' => 'haos_insurances_documents',
  'type' => 'link',
  'relationship' => 'haos_insurances_documents',
  'source' => 'non-db',
  'module' => 'HAOS_Insurances',
  'bean_name' => 'HAOS_Insurances',
  'vname' => 'LBL_HAOS_INSURANCES_DOCUMENTS_FROM_HAOS_INSURANCES_TITLE',
  'id_name' => 'haos_insurances_documentshaos_insurances_ida',
);
$dictionary["Document"]["fields"]["haos_insurances_documents_name"] = array (
  'name' => 'haos_insurances_documents_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAOS_INSURANCES_DOCUMENTS_FROM_HAOS_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'haos_insurances_documentshaos_insurances_ida',
  'link' => 'haos_insurances_documents',
  'table' => 'haos_insurances',
  'module' => 'HAOS_Insurances',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["haos_insurances_documentshaos_insurances_ida"] = array (
  'name' => 'haos_insurances_documentshaos_insurances_ida',
  'type' => 'link',
  'relationship' => 'haos_insurances_documents',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAOS_INSURANCES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
);
