<?php
$module_name = 'HAOS_Insurances';
$listViewDefs [$module_name] = 
array (
  'FRAMEWORKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORKS',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'INSURANCE_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_INSURANCE_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
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
  'INSURANCE_SUBTYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_INSURANCE_SUBTYPE',
    'id' => 'HAA_CODES_ID1_C',
    'link' => true,
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
  'ORGANIZATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ORGANIZATION',
    'width' => '10%',
    'default' => true,
  ),
  'INSURED_PERSON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSURED_PERSON',
    'width' => '10%',
    'default' => true,
  ),
  'FIRST_BENEFICIARY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FIRST_BENEFICIARY',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
