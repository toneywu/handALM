<?php
$module_name = 'HPR_Group_Priviliges';
$listViewDefs [$module_name] = 
array (
  'MODULE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_MODULE',
    'width' => '10%',
    'default' => true,
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
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SQL_STATEMENT_FOR_LISTVIEW' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_SQL_STATEMENT_FOR_LISTVIEW',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
