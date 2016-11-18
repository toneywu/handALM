<?php
// created: 2016-11-18 15:51:31
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'group_member' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_GROUP_MEMBER',
    'id' => 'HPR_GROUP_MEMBERS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HPR_Group_Members',
    'target_record_key' => 'hpr_group_members_id_c',
  ),
  'enabled_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'sql_statement_for_listview' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_SQL_STATEMENT_FOR_LISTVIEW',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'hpr_groups_hpr_group_priviliges_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_PRIVILIGES_FROM_HPR_GROUPS_TITLE',
    'id' => 'HPR_GROUPS_HPR_GROUP_PRIVILIGESHPR_GROUPS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HPR_Groups',
    'target_record_key' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
  ),
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HPR_Group_Priviliges',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HPR_Group_Priviliges',
    'width' => '5%',
    'default' => true,
  ),
);