<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2017-01-15 21:32:16
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_lines_documents"] = array (
  'name' => 'hat_counting_lines_documents',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_documents',
  'source' => 'non-db',
  'module' => 'Documents',
  'bean_name' => 'Document',
  'vname' => 'LBL_HAT_COUNTING_LINES_DOCUMENTS_FROM_DOCUMENTS_TITLE',
);


// created: 2017-01-15 21:32:16
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_lines_hat_counting_results"] = array (
  'name' => 'hat_counting_lines_hat_counting_results',
  'type' => 'link',
  'relationship' => 'hat_counting_lines_hat_counting_results',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Results',
  'bean_name' => 'HAT_Counting_Results',
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_LINES_HAT_COUNTING_RESULTS_FROM_HAT_COUNTING_RESULTS_TITLE',
);


// created: 2017-01-15 21:32:21
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_tasks_hat_counting_lines"] = array (
  'name' => 'hat_counting_tasks_hat_counting_lines',
  'type' => 'link',
  'relationship' => 'hat_counting_tasks_hat_counting_lines',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Tasks',
  'bean_name' => 'HAT_Counting_Tasks',
  'vname' => 'LBL_HAT_COUNTING_TASKS_HAT_COUNTING_LINES_FROM_HAT_COUNTING_TASKS_TITLE',
  'id_name' => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
);
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_tasks_hat_counting_lines_name"] = array (
  'name' => 'hat_counting_tasks_hat_counting_lines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_TASKS_HAT_COUNTING_LINES_FROM_HAT_COUNTING_TASKS_TITLE',
  'save' => true,
  'id_name' => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
  'link' => 'hat_counting_tasks_hat_counting_lines',
  'table' => 'hat_counting_tasks',
  'module' => 'HAT_Counting_Tasks',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Lines"]["fields"]["hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida"] = array (
  'name' => 'hat_counting_tasks_hat_counting_lineshat_counting_tasks_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_tasks_hat_counting_lines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_TASKS_HAT_COUNTING_LINES_FROM_HAT_COUNTING_LINES_TITLE',
);

?>