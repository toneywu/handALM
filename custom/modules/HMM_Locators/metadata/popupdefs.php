<?php
$popupMeta = array (
    'moduleMain' => 'HMM_Locators',
    'varName' => 'HMM_Locators',
    'orderBy' => 'hmm_locators.name',
    'whereClauses' => array (
  'name' => 'hmm_locators.name',
  'location' => 'hmm_locators.location',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'location',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'location',
  ),
),
);
