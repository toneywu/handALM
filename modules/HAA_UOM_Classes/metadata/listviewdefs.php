<?php
$module_name = 'HAA_UOM_Classes';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'BASE_UNIT_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_BASE_UNIT_NAME',
    'id' => 'BASE_UNIT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
