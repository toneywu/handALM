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
    'label' => 'LBL_SOURCE_SYSTEM',
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
  'ATTRIBUTE1_C' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTRACT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'ATTRIBUTE4_C' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_ERP_CONTRACT_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'ATTRIBUTE6_C' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRIBUTE6_C',
    'width' => '10%',
    'default' => true,
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
