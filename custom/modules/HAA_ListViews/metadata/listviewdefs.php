<?php
$module_name = 'HAA_ListViews';
$listViewDefs [$module_name] = 
array (
  'LISTVIEW_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LISTVIEW_CODE',
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
  'DATA_SOURCE_VIEW_NAME' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_DATA_SOURCE_VIEW_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'PAGE_ROWS' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_PAGE_ROWS',
    'width' => '10%',
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'SORT_COLUMN1' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SORT_COLUMN1',
    'width' => '10%',
    'default' => true,
  ),
  'SORT_COLUMN1_ORDER' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SORT_COLUMN1_ORDER',
    'width' => '10%',
    'default' => true,
  ),
);
?>
