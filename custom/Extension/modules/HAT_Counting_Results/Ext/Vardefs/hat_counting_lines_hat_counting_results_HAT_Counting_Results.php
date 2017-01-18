<?php
// created: 2017-01-15 21:32:16
$dictionary["HAT_Counting_Results"]["fields"]["hat_counting_lines_hat_counting_results"] = array (
  'name' => 'hat_counting_lines_hat_counting_results',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_hat_counting_results',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Lines',
  'bean_name' => 'HAT_Counting_Lines',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_LINES_TITLE',
  'id_name' => 'hat_counting_lines_hat_counting_resultshat_counting_lines_ida',
);
$dictionary["HAT_Counting_Results"]["fields"]["hat_counting_lines_hat_counting_results_name"] = array (
  'name' => 'hat_counting_lines_hat_counting_results_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_LINES_TITLE',
  'save' => true,
  'id_name' => 'hat_counting_lines_hat_counting_resultshat_counting_lines_ida',
  'link' => 'hat_counting_lines_hat_counting_results',
  'table' => 'hat_counting_lines',
  'module' => 'HAT_Counting_Lines',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Results"]["fields"]["hat_counting_lines_hat_counting_resultshat_counting_lines_ida"] = array (
  'name' => 'hat_counting_lines_hat_counting_resultshat_counting_lines_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_hat_counting_results',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_RESULTS_TITLE',
);
