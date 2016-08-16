<?php
$module_name = 'HAA_UOM';
$listViewDefs [$module_name] = 
array (

  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'UOM_SYMBOL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_UOM_SYMBOL',
    'width' => '10%',
    'default' => true,
  ),
  'UOM_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_UOM_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'UOM_CLASS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UOM_CLASS',
    'id' => 'HAA_UOM_CLASSES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),  
);
?>
