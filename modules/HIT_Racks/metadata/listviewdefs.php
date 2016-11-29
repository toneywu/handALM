<?php
$module_name = 'HIT_Racks';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HEIGHT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_HEIGHT',
    'width' => '3%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'vchar',
    'label' => 'LBL_ASSET_STATUS',
    'width' => '8%',
    'default' => true,
  ),
  'OCCUPATION' => 
  array (
    'type' => 'vchar',
    'studio' => 'visible',
    'label' => 'LBL_OCCUPATION',
    'width' => '10%',
    'default' => true,
  ),

  'HAT_ASSET_LOCATIONS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HAT_ASSET_LOCATIONS',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => false,
    'width' => '15%',
    'default' => true,
  ),

  'HAT_ASSET_USING_ORG' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_USING_ORG',
    'id' => 'HAT_ASSET_USING_ORG_ID',
    'link' => true,
    'width' => '15%',
    'default' => true,
  ),
  'HAT_ASSET_OWNING_ORG_USING' => 
  array (
    'width' => '5%',
    'label' => 'LBL_OWING_ORG_USING',
    'type' => 'varchar',
    'default' => true,
  ),
);
?>
