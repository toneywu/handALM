<?php
// created: 2016-12-21 10:11:56
$dictionary["HAT_Counting_Rule_Dtls"]["fields"]["hat_counting_rules_hat_counting_rule_dtls"] = array (
  'name' => 'hat_counting_rules_hat_counting_rule_dtls',
  'type' => 'link',
  'relationship' => 'hat_counting_rules_hat_counting_rule_dtls',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Rules',
  'bean_name' => 'HAT_Counting_Rules',
  'vname' => 'LBL_HAT_COUNTING_RULES_HAT_COUNTING_RULE_DTLS_FROM_HAT_COUNTING_RULES_TITLE',
  'id_name' => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
);
$dictionary["HAT_Counting_Rule_Dtls"]["fields"]["hat_counting_rules_hat_counting_rule_dtls_name"] = array (
  'name' => 'hat_counting_rules_hat_counting_rule_dtls_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_RULES_HAT_COUNTING_RULE_DTLS_FROM_HAT_COUNTING_RULES_TITLE',
  'save' => true,
  'id_name' => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
  'link' => 'hat_counting_rules_hat_counting_rule_dtls',
  'table' => 'hat_counting_rules',
  'module' => 'HAT_Counting_Rules',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Rule_Dtls"]["fields"]["hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida"] = array (
  'name' => 'hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_rules_hat_counting_rule_dtls',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_RULES_HAT_COUNTING_RULE_DTLS_FROM_HAT_COUNTING_RULE_DTLS_TITLE',
);
