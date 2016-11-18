<?php
// created: 2016-11-18 15:23:21
$dictionary["HPR_Group_Priviliges"]["fields"]["hpr_groups_hpr_group_priviliges"] = array (
  'name' => 'hpr_groups_hpr_group_priviliges',
  'type' => 'link',
  'relationship' => 'hpr_groups_hpr_group_priviliges',
  'source' => 'non-db',
  'module' => 'HPR_Groups',
  'bean_name' => 'HPR_Groups',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_PRIVILIGES_FROM_HPR_GROUPS_TITLE',
  'id_name' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
);
$dictionary["HPR_Group_Priviliges"]["fields"]["hpr_groups_hpr_group_priviliges_name"] = array (
  'name' => 'hpr_groups_hpr_group_priviliges_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_PRIVILIGES_FROM_HPR_GROUPS_TITLE',
  'save' => true,
  'id_name' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
  'link' => 'hpr_groups_hpr_group_priviliges',
  'table' => 'hpr_groups',
  'module' => 'HPR_Groups',
  'rname' => 'name',
);
$dictionary["HPR_Group_Priviliges"]["fields"]["hpr_groups_hpr_group_priviligeshpr_groups_ida"] = array (
  'name' => 'hpr_groups_hpr_group_priviligeshpr_groups_ida',
  'type' => 'link',
  'relationship' => 'hpr_groups_hpr_group_priviliges',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_PRIVILIGES_FROM_HPR_GROUP_PRIVILIGES_TITLE',
);
