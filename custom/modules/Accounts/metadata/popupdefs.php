<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'parent_name' => 'accounts.parent_name',
  'org_type_c' => 'accounts_cstm.org_type_c',
  'is_le_c' => 'accounts_cstm.is_le_c',
  'is_cooperation_group_c' => 'accounts_cstm.is_cooperation_group_c',
),
    'searchInputs' => array (
  0 => 'name',
  9 => 'parent_name',
  10 => 'org_type_c',
  11 => 'is_le_c',
  12 => 'is_cooperation_group_c',
),
    'create' => array (
  'formBase' => 'AccountFormBase.php',
  'formBaseClass' => 'AccountFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'AccountSave',
  ),
  'createButton' => 'LNK_NEW_ACCOUNT',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'parent_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MEMBER_OF',
    'id' => 'PARENT_ID',
    'width' => '10%',
    'name' => 'parent_name',
  ),
  'org_type_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ORG_TYPE',
    'width' => '10%',
    'name' => 'org_type_c',
  ),
  'is_le_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_IS_LE',
    'width' => '10%',
    'name' => 'is_le_c',
  ),
  'is_cooperation_group_c' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_IS_COOPERATION_GROUP',
    'width' => '10%',
    'name' => 'is_cooperation_group_c',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'FULL_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_FULL_NAME',
    'width' => '30%',
    'name' => 'full_name_c',
  ),
  'ORG_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ORG_TYPE',
    'width' => '10%',
    'name' => 'org_type_c',
  ),
  'PARENT_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MEMBER_OF',
    'id' => 'PARENT_ID',
    'width' => '15%',
    'default' => true,
    'name' => 'parent_name',
  ),
  'IS_COOPERATION_GROUP_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_COOPERATION_GROUP',
    'width' => '10%',
    'name' => 'is_cooperation_group_c',
  ),
  'IS_LE_C' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_LE',
    'width' => '10%',
    'name' => 'is_le_c',
  ),
),
);
