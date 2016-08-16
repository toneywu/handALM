<?php
// created: 2016-04-23 12:02:58
$dictionary["HAA_UOM_Conversions"]["fields"]["aos_products_haa_uom_conversions_1"] = array (
  'name' => 'aos_products_haa_uom_conversions_1',
  'type' => 'link',
  'relationship' => 'aos_products_haa_uom_conversions_1',
  'source' => 'non-db',
  'module' => 'AOS_Products',
  'bean_name' => 'AOS_Products',
  'vname' => 'LBL_AOS_PRODUCTS_HAA_UOM_CONVERSIONS_1_FROM_AOS_PRODUCTS_TITLE',
  'id_name' => 'aos_products_haa_uom_conversions_1aos_products_ida',
);
$dictionary["HAA_UOM_Conversions"]["fields"]["aos_products_haa_uom_conversions_1_name"] = array (
  'name' => 'aos_products_haa_uom_conversions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AOS_PRODUCTS_HAA_UOM_CONVERSIONS_1_FROM_AOS_PRODUCTS_TITLE',
  'save' => true,
  'id_name' => 'aos_products_haa_uom_conversions_1aos_products_ida',
  'link' => 'aos_products_haa_uom_conversions_1',
  'table' => 'aos_products',
  'module' => 'AOS_Products',
  'rname' => 'name',
);
$dictionary["HAA_UOM_Conversions"]["fields"]["aos_products_haa_uom_conversions_1aos_products_ida"] = array (
  'name' => 'aos_products_haa_uom_conversions_1aos_products_ida',
  'type' => 'link',
  'relationship' => 'aos_products_haa_uom_conversions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AOS_PRODUCTS_HAA_UOM_CONVERSIONS_1_FROM_HAA_UOM_CONVERSIONS_TITLE',
);
