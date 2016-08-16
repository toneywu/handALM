<?php
$module_name = 'HAT_Meters';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'asset' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ASSET',
        'id' => 'HAT_ASSETS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'asset',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'asset' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ASSET',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'id' => 'HAT_ASSETS_ID_C',
        'name' => 'asset',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
