<?php
$where_popup = " 1=1 ";
if(isset($_REQUEST["ham_wo_contract_id"])&&!empty($_REQUEST["ham_wo_contract_id"])){
    $where_popup.="and aos_products.id IN (
                    SELECT
                      l.product_id
                    FROM
                      aos_contracts h,
                      aos_products_quotes l 
                    WHERE h.id = l.parent_id
                       AND  h.id = '".$_REQUEST["ham_wo_contract_id"]."')";
}
if(isset($_REQUEST["contract_flag_c_advanced"])&&!empty($_REQUEST["contract_flag_c_advanced"])){
    $where_popup.="and aos_products_cstm.contract_flag_c = '".$_REQUEST["contract_flag_c_advanced"]."'";
}

$popupMeta = array (
    'moduleMain' => 'AOS_Products',
    'varName' => 'AOS_Products',
    'orderBy' => 'aos_products.name',
    'whereClauses' => array (
  'name' => 'aos_products.name',
  'description' => 'aos_products.description',
),
    'whereStatement'=>$where_popup,

    'searchInputs' => array (
  1 => 'name',
  10 => 'description',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
  'CATEGORY' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
    'default' => true,
  ),
),
);
