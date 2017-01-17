<?php
// created: 2017-01-15 21:32:22
$dictionary["HAT_Counting_Template_Details"]["fields"]["hat_counting_task_templates_hat_counting_template_details"] = array (
  'name' => 'hat_counting_task_templates_hat_counting_template_details',
  'type' => 'link',
  'relationship' => 'hat_counting_task_templates_hat_counting_template_details',
  'source' => 'non-db',
  'module' => 'HAT_Counting_Task_Templates',
  'bean_name' => 'HAT_Counting_Task_Templates',
  'vname' => 'LBL_HAT_COUNTING_TASK_TEMPLATES_HAT_COUNTING_TEMPLATE_DETAILS_FROM_HAT_COUNTING_TASK_TEMPLATES_TITLE',
  'id_name' => 'hat_countid917mplates_ida',
);
$dictionary["HAT_Counting_Template_Details"]["fields"]["hat_counting_task_templates_hat_counting_template_details_name"] = array (
  'name' => 'hat_counting_task_templates_hat_counting_template_details_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAT_COUNTING_TASK_TEMPLATES_HAT_COUNTING_TEMPLATE_DETAILS_FROM_HAT_COUNTING_TASK_TEMPLATES_TITLE',
  'save' => true,
  'id_name' => 'hat_countid917mplates_ida',
  'link' => 'hat_counting_task_templates_hat_counting_template_details',
  'table' => 'hat_counting_task_templates',
  'module' => 'HAT_Counting_Task_Templates',
  'rname' => 'name',
);
$dictionary["HAT_Counting_Template_Details"]["fields"]["hat_countid917mplates_ida"] = array (
  'name' => 'hat_countid917mplates_ida',
  'type' => 'link',
  'relationship' => 'hat_counting_task_templates_hat_counting_template_details',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAT_COUNTING_TASK_TEMPLATES_HAT_COUNTING_TEMPLATE_DETAILS_FROM_HAT_COUNTING_TEMPLATE_DETAILS_TITLE',
);
