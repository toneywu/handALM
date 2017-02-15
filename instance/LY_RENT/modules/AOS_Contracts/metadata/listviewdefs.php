<?php
$listViewDefs ['AOS_Contracts'] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
   'TYPE_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'CONTRACT_NUMBER_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CONTRACT_NUMBER',
    'width' => '10%',
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  /*'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
    'module' => 'Users',
    'id' => 'ASSIGNED_USER_ID',
    'link' => true,
  ),*/
  'CONTRACT_ACCOUNT' => 
  array (
    'width' => '15%',
    'label' => 'LBL_CONTRACT_ACCOUNT',
    'default' => true,
    'module' => 'Accounts',
    'id' => 'CONTRACT_ACCOUNT_ID',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'contract_account_id',
    ),
  ),
  'TOTAL_AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_GRAND_TOTAL',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'BUSINESS_TYPE_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_BUSINESS_TYPE',
    'id' => 'HAA_CODES_ID1_C',
    'link' => true,
    'width' => '10%',
  ),
  'START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'END_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
  ),
  'TOTAL_CONTRACT_VALUE' => 
  array (
    'label' => 'LBL_TOTAL_CONTRACT_VALUE',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
