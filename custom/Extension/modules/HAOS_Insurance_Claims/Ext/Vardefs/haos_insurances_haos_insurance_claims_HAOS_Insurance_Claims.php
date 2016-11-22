<?php
// created: 2016-11-22 18:14:18
$dictionary["HAOS_Insurance_Claims"]["fields"]["haos_insurances_haos_insurance_claims"] = array (
  'name' => 'haos_insurances_haos_insurance_claims',
  'type' => 'link',
  'relationship' => 'haos_insurances_haos_insurance_claims',
  'source' => 'non-db',
  'module' => 'HAOS_Insurances',
  'bean_name' => 'HAOS_Insurances',
  'vname' => 'LBL_HAOS_INSURANCES_HAOS_INSURANCE_CLAIMS_FROM_HAOS_INSURANCES_TITLE',
  'id_name' => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
);
$dictionary["HAOS_Insurance_Claims"]["fields"]["haos_insurances_haos_insurance_claims_name"] = array (
  'name' => 'haos_insurances_haos_insurance_claims_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAOS_INSURANCES_HAOS_INSURANCE_CLAIMS_FROM_HAOS_INSURANCES_TITLE',
  'save' => true,
  'id_name' => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
  'link' => 'haos_insurances_haos_insurance_claims',
  'table' => 'haos_insurances',
  'module' => 'HAOS_Insurances',
  'rname' => 'name',
);
$dictionary["HAOS_Insurance_Claims"]["fields"]["haos_insurances_haos_insurance_claimshaos_insurances_ida"] = array (
  'name' => 'haos_insurances_haos_insurance_claimshaos_insurances_ida',
  'type' => 'link',
  'relationship' => 'haos_insurances_haos_insurance_claims',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAOS_INSURANCES_HAOS_INSURANCE_CLAIMS_FROM_HAOS_INSURANCE_CLAIMS_TITLE',
);
