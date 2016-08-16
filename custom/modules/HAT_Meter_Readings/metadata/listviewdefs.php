<?php
$module_name = 'HAT_Meter_Readings';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'METER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_METER',
    'id' => 'METER_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'READING_THIS_TIME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_READING_THIS_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'ACCUMULAT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ACCUMULAT',
    'width' => '10%',
    'default' => true,
  ),
  'READING_TYPE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_READING_TYPE',
    'width' => '10%',
  ),
);
?>
