<?php
$module_name = 'HAT_Linear_Reference_Methods';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'LINEAR_UNIT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LINEAR_UNIT',
    'id' => 'LINEAR_UNIT_ID',
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
