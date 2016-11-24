<?php
// created: 2016-11-22 18:14:21
$dictionary["HAOS_Insurance_Claims_Lines"]["fields"]["haos_insurance_claims_haos_insurance_claims_lines"] = array (
  'name' => 'haos_insurance_claims_haos_insurance_claims_lines',
  'type' => 'link',
  'relationship' => 'haos_insurance_claims_haos_insurance_claims_lines',
  'source' => 'non-db',
  'module' => 'HAOS_Insurance_Claims',
  'bean_name' => 'HAOS_Insurance_Claims',
  'vname' => 'LBL_HAOS_INSURANCE_CLAIMS_HAOS_INSURANCE_CLAIMS_LINES_FROM_HAOS_INSURANCE_CLAIMS_TITLE',
  'id_name' => 'haos_insurefcc_claims_ida',
);
$dictionary["HAOS_Insurance_Claims_Lines"]["fields"]["haos_insurance_claims_haos_insurance_claims_lines_name"] = array (
  'name' => 'haos_insurance_claims_haos_insurance_claims_lines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAOS_INSURANCE_CLAIMS_HAOS_INSURANCE_CLAIMS_LINES_FROM_HAOS_INSURANCE_CLAIMS_TITLE',
  'save' => true,
  'id_name' => 'haos_insurefcc_claims_ida',
  'link' => 'haos_insurance_claims_haos_insurance_claims_lines',
  'table' => 'haos_insurance_claims',
  'module' => 'HAOS_Insurance_Claims',
  'rname' => 'name',
);
$dictionary["HAOS_Insurance_Claims_Lines"]["fields"]["haos_insurefcc_claims_ida"] = array (
  'name' => 'haos_insurefcc_claims_ida',
  'type' => 'link',
  'relationship' => 'haos_insurance_claims_haos_insurance_claims_lines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAOS_INSURANCE_CLAIMS_HAOS_INSURANCE_CLAIMS_LINES_FROM_HAOS_INSURANCE_CLAIMS_LINES_TITLE',
);
