<?php
$popupMeta = array (
    'moduleMain' => 'HAA_UOM',
    'varName' => 'HAA_UOM',
    'orderBy' => 'haa_uom.name',
    'whereClauses' => array (
  'name' => 'haa_uom.name',
  'uom_class' => 'haa_uom.uom_class',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'uom_class',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'uom_class' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UOM_CLASS',
    'id' => 'HAA_UOM_CLASSES_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'uom_class',
  ),
),
);
