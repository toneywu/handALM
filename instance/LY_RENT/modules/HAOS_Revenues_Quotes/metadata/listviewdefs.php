<?php
$module_name = 'HAOS_Revenues_Quotes';
$listViewDefs [$module_name] = 
array (
  'REVENUE_QUOTE_NUMBER' => 
  array (
    'width' => '15%',
    'label' => 'LBL_REVENUE_QUOTE_NUMBER',
    'default' => true,
    'link' => true,
    ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    ),
  'SOURCE_CODE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SOURCE_CODE',
    'width' => '10%',
    'default' => true,
    ),
  'SOURCE_NAME' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SOURCE_NAME',
    'width' => '10%',
    ),
  /*'EXPENSE_GROUP' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EXPENSE_GROUP',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    ),
  'LINE_ITEM_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LINE_ITEM_TYPE',
    'width' => '10%',
    ),*/
  'EVENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EVENT_DATE',
    'width' => '10%',
    'default' => true,
    ),
  'DUE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE',
    'width' => '10%',
    'default' => true,
    ),
  'CLEAR_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_CLEAR_STATUS',
    'width' => '10%',
    'default' => true,
    ),
  'CLEARED_STATUS' => 
  array (
    'studio' => 'visible',
    'label' => 'LBL_CLEARED_STATUS',
    'width' => '10%',
    'default' => true,
    ),
  'ACCOUNT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    ),
  'CONTRACT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTRACT_NAME',
    'id' => 'CONTACT_ID_C',
    'link' => true,
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
