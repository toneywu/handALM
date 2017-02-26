<?php
$popupMeta = array (
    'moduleMain' => 'HAOS_Payments',
    'varName' => 'HAOS_Payments',
    'orderBy' => 'haos_payments.name',
    'whereClauses' => array (
  'name' => 'haos_payments.name',
  'frameworks' => 'haos_payments.frameworks',
  'period_name' => 'haos_payments.period_name',
  'payment_method_type' => 'haos_payments.payment_method_type',
  'payment_status' => 'haos_payments.payment_status',
  'currency_id' => 'haos_payments.currency_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'frameworks',
  5 => 'period_name',
  6 => 'payment_method_type',
  7 => 'payment_status',
  8 => 'currency_id',
),
    'searchdefs' => array (
  'frameworks' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORKS',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'frameworks',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'period_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PERIOD_NAME',
    'id' => 'HAA_PERIODS_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'period_name',
  ),
  'payment_method_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_METHOD_TYPE',
    'width' => '10%',
    'name' => 'payment_method_type',
  ),
  'payment_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
    'name' => 'payment_status',
  ),
  'currency_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CURRENCY_ID',
    'width' => '10%',
    'name' => 'currency_id',
  ),
),
);
