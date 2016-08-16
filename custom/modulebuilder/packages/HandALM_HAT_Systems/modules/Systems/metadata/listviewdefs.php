<?php
$module_name = 'HAT_Systems';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'IS_NETWORK' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_NETWORK',
    'width' => '10%',
  ),
  'IS_PRIMARY' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_PRIMARY',
    'width' => '10%',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
);
?>
