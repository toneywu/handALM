<?php
// created: 2016-12-24 15:08:38
$dictionary["HAT_Counting_Batch_Rules"]["fields"]["hat_counting_batchs_hat_counting_batch_rules"] = array (
  'name' => 'hat_counting_batchs_hat_counting_batch_rules',
  'type' => 'link',
  'relationship' => 'hat_counting_batchs_hat_counting_batch_rules',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Batchs',
  'bean_name' => 'HAT_Counting_Batchs',
  'vname' => 'LBL_HAT_COUNTING_BATCHS_HAT_COUNTING_BATCH_RULES_FROM_HAT_COUNTING_BATCHS_TITLE',
  'id_name' => 'hat_counti9a14_batchs_ida',
);
$dictionary["HAT_Counting_Batch_Rules"]["fields"]["hat_counting_batchs_hat_counting_batch_rules_name"] = array (
  'name' => 'hat_counting_batchs_hat_counting_batch_rules_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_BATCHS_HAT_COUNTING_BATCH_RULES_FROM_HAT_COUNTING_BATCHS_TITLE',
  'save' => true,
  'id_name' => 'hat_counti9a14_batchs_ida',
  'link' => 'hat_counting_batchs_hat_counting_batch_rules',
  'table' => 'hat_counting_batchs',
  'module' => 'HAT_Counting_Batchs',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Batch_Rules"]["fields"]["hat_counti9a14_batchs_ida"] = array (
  'name' => 'hat_counti9a14_batchs_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_batchs_hat_counting_batch_rules',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_BATCHS_HAT_COUNTING_BATCH_RULES_FROM_HAT_COUNTING_BATCH_RULES_TITLE',
);
