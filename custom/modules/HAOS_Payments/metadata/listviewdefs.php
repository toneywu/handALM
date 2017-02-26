<?php
$module_name = 'HAOS_Payments';
$listViewDefs [$module_name] = 
array (
  // 'FRAMEWORKS' => 
  // array (
  //   'type' => 'relate',
  //   'studio' => 'visible',
  //   'label' => 'LBL_FRAMEWORKS',
  //   'id' => 'HAA_FRAMEWORKS_ID_C',
  //   'link' => true,
  //   'width' => '10%',
  //   'default' => true,
  // ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PAYMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'PERIOD_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PERIOD_NAME',
    'id' => 'HAA_PERIODS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  // 'CURRENCY_ID' => 
  // array (
  //   'type' => 'varchar',
  //   'label' => 'LBL_CURRENCY_ID',
  //   'width' => '10%',
  //   'default' => true,
  // ),
  'PAYMENT_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_PAYMENT_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PAYMENT_METHOD_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_METHOD_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'RESPONSIBLE_PERSON' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_RESPONSIBLE_PERSON',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PAYMENT_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'CUST_ACCOUNT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CUST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_NUMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_NUMBER',
    'id' => 'CONTACT_ID1_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_NAME' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_NAME',
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
