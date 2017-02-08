<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Counting_Policies',
    'varName' => 'HAT_Counting_Policies',
    'orderBy' => 'hat_counting_policies.name',
    'whereClauses' => array (
  'name' => 'hat_counting_policies.name',
),
    'searchInputs' => array (
  0 => 'hat_counting_policies_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'SPLIT_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SPLIT_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'split_type',
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'TASK_TEMPLATES' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TASK_TEMPLATES',
    'id' => 'HAT_COUNTING_TASK_TEMPLATES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
    'name' => 'enabled_flag',
  ),
),
);
