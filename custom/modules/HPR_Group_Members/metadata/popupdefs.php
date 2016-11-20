<?php
$popupMeta = array (
    'moduleMain' => 'HPR_Group_Members',
    'varName' => 'HPR_Group_Members',
    'orderBy' => 'hpr_group_members.name',
    'whereClauses' => array (
  'name' => 'hpr_group_members.name',
),
    'searchInputs' => array (
  1 => 'name',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'ORGANIZATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ORGANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'organization',
  ),
  'USER_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_USER_NAME',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'user_name',
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
    'name' => 'enabled_flag',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
  ),
),
);
