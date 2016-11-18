<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'parent_name' => 'accounts.parent_name',
  'is_le_c' => 'accounts_cstm.is_le_c',
  'is_cooperation_group_c' => 'accounts_cstm.is_cooperation_group_c',
  'frame_c' => 'accounts.frame_c',
  'business_type_c' => 'accounts.business_type_c',
),
'whereStatement'=>'(("'.$_REQUEST["asset_using_org"].'"="Y" and accounts_cstm.org_type_c in ("INTERNAL","EXTERNAL")) or "'.$_REQUEST["asset_using_org"].'" ="" )',
    'searchInputs' => array (
  0 => 'name',
  9 => 'parent_name',
  11 => 'is_le_c',
  12 => 'is_cooperation_group_c',
  13 => 'frame_c',
  14 => 'business_type_c',
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
  'frame_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAME',
    'id' => 'HAA_FRAMEWORKS_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'frame_c',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'business_type_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_BUSINESS_TYPE',
    'id' => 'HAA_CODES_ID1_C',
    'link' => true,
    'width' => '10%',
    'name' => 'business_type_c',
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
    'width' => '30%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
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
    'width' => '25%',
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
