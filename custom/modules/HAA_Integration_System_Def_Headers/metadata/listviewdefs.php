<?php
$module_name = 'HAA_Integration_System_Def_Headers';
$listViewDefs [$module_name] = 
array (
 /* 'FRAMEWORKS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORKS',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),*/
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
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'LINK_SYSTEM' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_LIMK_SYSTEM',
    'width' => '10%',
    'default' => true,
  ),
  'INTERFACE_TYPE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_INTERFACE_TYPE',
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
  'EFFECTED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_EFFECTED_FLAG',
    'width' => '10%',
  ),
);
?>
