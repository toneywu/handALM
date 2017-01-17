<?php
// created: 2017-01-15 21:32:18
$dictionary["HAT_Counting_Policies"]["fields"]["hat_counting_policy_groups_hat_counting_policies"] = array (
  'name' => 'hat_counting_policy_groups_hat_counting_policies',
  'type' => 'link',
  'relationship' => 'hat_counting_policy_groups_hat_counting_policies',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Policy_Groups',
  'bean_name' => 'HAT_Counting_Policy_Groups',
  'vname' => 'LBL_HAT_COUNTING_POLICY_GROUPS_HAT_COUNTING_POLICIES_FROM_HAT_COUNTING_POLICY_GROUPS_TITLE',
  'id_name' => 'hat_counti1658_groups_ida',
);
$dictionary["HAT_Counting_Policies"]["fields"]["hat_counting_policy_groups_hat_counting_policies_name"] = array (
  'name' => 'hat_counting_policy_groups_hat_counting_policies_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_POLICY_GROUPS_HAT_COUNTING_POLICIES_FROM_HAT_COUNTING_POLICY_GROUPS_TITLE',
  'save' => true,
  'id_name' => 'hat_counti1658_groups_ida',
  'link' => 'hat_counting_policy_groups_hat_counting_policies',
  'table' => 'hat_counting_policy_groups',
  'module' => 'HAT_Counting_Policy_Groups',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Policies"]["fields"]["hat_counti1658_groups_ida"] = array (
  'name' => 'hat_counti1658_groups_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_policy_groups_hat_counting_policies',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_POLICY_GROUPS_HAT_COUNTING_POLICIES_FROM_HAT_COUNTING_POLICIES_TITLE',
);
