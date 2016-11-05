<?php
$module_name = 'HAM_ACT';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'EVENT_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'id' => 'HAT_EVENT_TYPE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
