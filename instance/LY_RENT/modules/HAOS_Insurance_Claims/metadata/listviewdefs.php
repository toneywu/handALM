<?php
$module_name = 'HAOS_Insurance_Claims';
$listViewDefs [$module_name] = 
array (
  'CLAIM_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CLAIM_NUMBER',
    'width' => '10%',
    'default' => true,
    ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    ),
  'PARENT_NAME' => 
  array (
    'type' => 'parent',
    'studio' => 'visible',
    'label' => 'LBL_FLEX_RELATE',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
      ),
    'width' => '10%',
    'default' => true,
    ),
  'wo_info' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_INFO',
    'width' => '10%',
    'default' => true,
    ),   
  'CLAIM_TOTAL_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_CLAIM_TOTAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    ),
  'GAP_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_GAP_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    ),
  'ACT_CLAIM_TOTAL_AMT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_ACT_CLAIM_TOTAL_AMT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
    ),
  );
  ?>
