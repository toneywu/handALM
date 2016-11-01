<?php
$popupMeta = array (
  'moduleMain' => 'AOS_Contracts',
  'varName' => 'AOS_Contracts',
  'orderBy' => 'aos_contracts.name',
  'whereClauses' => array (
    'name' => 'aos_contracts.name',
    'status' => 'aos_contracts.status',
    'start_date' => 'aos_contracts.start_date',
    'end_date' => 'aos_contracts.end_date',
    'contract_number_c' => 'aos_contracts_cstm.contract_number_c',
    'business_type_c' => 'aos_contracts.business_type_c',
    'contract_account' => 'aos_contracts.contract_account',
    'type_c' => 'aos_contracts.type_c',
    'framework_c' => 'aos_contracts.framework_c',
    ),
  'searchInputs' => array (
    1 => 'name',
    3 => 'status',
    5 => 'start_date',
    6 => 'end_date',
    7 => 'contract_number_c',
    8 => 'business_type_c',
    9 => 'contract_account',
    10 => 'type_c',
    11 => 'framework_c',
    ),
  'searchdefs' => array (
    'name' => 
    array (
      'type' => 'name',
      'label' => 'LBL_NAME',
      'width' => '10%',
      'name' => 'name',
      ),
    'status' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'label' => 'LBL_STATUS',
      'sortable' => false,
      'width' => '10%',
      'name' => 'status',
      ),
    'type_c' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'label' => 'LBL_TYPE',
      'id' => 'HAA_CODES_ID_C',
      'link' => true,
      'width' => '10%',
      'name' => 'type_c',
      'displayParams' => 
      array (
        'initial_filter' => '&code_type_advanced=contract_type'
        ),
      ),
    'contract_number_c' => 
    array (
      'type' => 'varchar',
      'label' => 'LBL_CONTRACT_NUMBER',
      'width' => '10%',
      'name' => 'contract_number_c',
      ),
    'business_type_c' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'label' => 'LBL_BUSINESS_TYPE',
      'id' => 'HAA_CODES_ID1_C',
      'link' => true,
      'width' => '10%',
      'name' => 'business_type_c',
      'displayParams' => 
      array (
        'initial_filter' => '&code_type_advanced=contract_business_type'
        ),
      ),
    'contract_account' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'label' => 'LBL_CONTRACT_ACCOUNT',
      'id' => 'CONTRACT_ACCOUNT_ID',
      'link' => true,
      'width' => '10%',
      'name' => 'contract_account',
      ),
    'start_date' => 
    array (
      'type' => 'date',
      'label' => 'LBL_START_DATE',
      'width' => '10%',
      'name' => 'start_date',
      ),
    'end_date' => 
    array (
      'type' => 'date',
      'label' => 'LBL_END_DATE',
      'width' => '10%',
      'name' => 'end_date',
      ),
    ),
  'listviewdefs' => array (
    'NAME' => 
    array (
      'width' => '15%',
      'label' => 'LBL_NAME',
      'default' => true,
      'link' => true,
      'name' => 'name',
      ),
    'TYPE_C' => 
    array (
      'type' => 'relate',
      'default' => true,
      'label' => 'LBL_TYPE',
      'width' => '10%',
      'name' => 'type_c',
      ),
    'CONTRACT_NUMBER_C' => 
    array (
      'type' => 'varchar',
      'default' => true,
      'label' => 'LBL_CONTRACT_NUMBER',
      'width' => '10%',
      'name' => 'contract_number_c',
      ),
    'STATUS' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'label' => 'LBL_STATUS',
      'sortable' => false,
      'width' => '5%',
      'name' => 'status',
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
      'name' => 'contract_account',
      ),
    'TOTAL_AMOUNT' => 
    array (
      'type' => 'currency',
      'label' => 'LBL_GRAND_TOTAL',
      'currency_format' => true,
      'width' => '10%',
      'default' => true,
      'name' => 'total_amount',
      ),
    'BUSINESS_TYPE_C' => 
    array (
      'type' => 'relate',
      'default' => true,
      'studio' => 'visible',
      'label' => 'LBL_BUSINESS_TYPE',
      'id' => 'HAA_CODES_ID1_C',
      'link' => true,
      'width' => '15%',
      'name' => 'business_type_c',
      ),
    'START_DATE' => 
    array (
      'type' => 'date',
      'label' => 'LBL_START_DATE',
      'width' => '6%',
      'default' => true,
      'name' => 'start_date',
      ),
    'END_DATE' => 
    array (
      'type' => 'date',
      'label' => 'LBL_END_DATE',
      'width' => '6%',
      'default' => true,
      'name' => 'end_date',
      ),
    ),
  );
