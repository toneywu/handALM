<?php
$module_name = 'HPR_AM_Roles';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FLAG_GLOBAL' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_FLAG_GLOBAL',
    'width' => '10%',
  ),
  'FLAG_CATALOG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_FLAG_CATALOG',
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
);
?>
