<?php
// created: 2016-03-25 23:33:17
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_lines_hat_counting_batchs"] = array (
  'name' => 'hat_counting_lines_hat_counting_batchs',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_hat_counting_batchs',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Batchs',
  'bean_name' => 'HAT_Counting_Batchs',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_BATCHS_FROM_HAT_COUNTING_BATCHS_TITLE',
  'id_name' => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
);
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_lines_hat_counting_batchs_name"] = array (
  'name' => 'hat_counting_lines_hat_counting_batchs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_BATCHS_FROM_HAT_COUNTING_BATCHS_TITLE',
  'save' => true,
  'id_name' => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
  'link' => 'hat_counting_lines_hat_counting_batchs',
  'table' => 'hat_counting_batchs',
  'module' => 'HAT_Counting_Batchs',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_lines_hat_counting_batchshat_counting_batchs_ida"] = array (
  'name' => 'hat_counting_lines_hat_counting_batchshat_counting_batchs_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_hat_counting_batchs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_BATCHS_FROM_HAT_COUNTING_LINES_TITLE',
);
