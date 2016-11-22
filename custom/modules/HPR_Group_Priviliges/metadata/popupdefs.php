<?php
$popupMeta = array (
    'moduleMain' => 'HPR_Group_Priviliges',
    'varName' => 'HPR_Group_Priviliges',
    'orderBy' => 'hpr_group_priviliges.name',
    'whereClauses' => array (
  'name' => 'hpr_group_priviliges.name',
),
    'searchInputs' => array (
  0 => 'hpr_group_priviliges_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
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
  'PRIVILIGE_MODULE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MODULE',
    'width' => '10%',
    'default' => true,
    'name' => 'module',
  ),
  'GROUP_MEMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_GROUP_MEMBER',
    'id' => 'HPR_GROUP_MEMBERS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'group_member',
  ),
  'SQL_STATEMENT_FOR_LISTVIEW' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_SQL_STATEMENT_FOR_LISTVIEW',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'sql_statement_for_listview',
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
