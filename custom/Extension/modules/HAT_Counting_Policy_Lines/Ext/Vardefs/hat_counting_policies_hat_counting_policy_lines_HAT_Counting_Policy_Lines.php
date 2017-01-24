<?php
// created: 2017-01-13 16:43:14
$dictionary["HAT_Counting_Policy_Lines"]["fields"]["hat_counting_policies_hat_counting_policy_lines"] = array (
  'name' => 'hat_counting_policies_hat_counting_policy_lines',
  'type' => 'link',
  'relationship' => 'hat_counting_policies_hat_counting_policy_lines',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Policies',
  'bean_name' => 'HAT_Counting_Policies',
  'vname' => 'LBL_HAT_COUNTING_POLICIES_HAT_COUNTING_POLICY_LINES_FROM_HAT_COUNTING_POLICIES_TITLE',
  'id_name' => 'hat_counti5649olicies_ida',
);
$dictionary["HAT_Counting_Policy_Lines"]["fields"]["hat_counting_policies_hat_counting_policy_lines_name"] = array (
  'name' => 'hat_counting_policies_hat_counting_policy_lines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_POLICIES_HAT_COUNTING_POLICY_LINES_FROM_HAT_COUNTING_POLICIES_TITLE',
  'save' => true,
  'id_name' => 'hat_counti5649olicies_ida',
  'link' => 'hat_counting_policies_hat_counting_policy_lines',
  'table' => 'hat_counting_policies',
  'module' => 'HAT_Counting_Policies',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Policy_Lines"]["fields"]["hat_counti5649olicies_ida"] = array (
  'name' => 'hat_counti5649olicies_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_policies_hat_counting_policy_lines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_POLICIES_HAT_COUNTING_POLICY_LINES_FROM_HAT_COUNTING_POLICY_LINES_TITLE',
);
