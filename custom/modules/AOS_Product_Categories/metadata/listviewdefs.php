<?php
$module_name = 'AOS_Product_Categories';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '22%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'IS_PARENT' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_PARENT',
    'width' => '3%',
  ),
  'PARENT_CATEGORY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_PRODUCT_CATEGORYS_NAME',
    'id' => 'PARENT_CATEGORY_ID',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '33%',
    'default' => true,
  ),
);
?>
