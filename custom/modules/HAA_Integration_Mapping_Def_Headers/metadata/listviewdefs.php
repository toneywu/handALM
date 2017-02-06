<?php
$module_name = 'HAA_Integration_Mapping_Def_Headers';
$listViewDefs [$module_name] = 
array (
  /*'FRAMEWORKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORKS',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),*/
  'MAPING_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MAPING_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'OWN_INTERFACE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWN_INTERFACE',
    'id' => 'HAA_INTERFACES_ID_C',
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
);
?>
