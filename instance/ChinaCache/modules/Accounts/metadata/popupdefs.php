<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  /*'parent_name' => 'accounts.parent_name',
  'is_le_c' => 'accounts_cstm.is_le_c',
  'is_cooperation_group_c' => 'accounts_cstm.is_cooperation_group_c',
  'frame_c' => 'accounts.frame_c',
  'business_type_c' => 'accounts.business_type_c',*/
),


'whereStatement'=>'(("'.$_REQUEST["asset_using_org"].'"="Y" and accounts_cstm.is_asset_org_c=1) or ("'.$_REQUEST["asset_using_org"].'"="D" and accounts_cstm.org_type_c in ("INTERNAL")) or "'.$_REQUEST["asset_using_org"].'" ="" )',

    'searchInputs' => array (
  0 => 'name',
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
),
);
