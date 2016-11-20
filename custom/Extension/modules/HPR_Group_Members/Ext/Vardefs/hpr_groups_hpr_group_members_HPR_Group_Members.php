<?php
// created: 2016-11-18 15:23:20
$dictionary["HPR_Group_Members"]["fields"]["hpr_groups_hpr_group_members"] = array (
  'name' => 'hpr_groups_hpr_group_members',
  'type' => 'link',
  'relationship' => 'hpr_groups_hpr_group_members',
  'source' => 'non-db',
  'module' => 'HPR_Groups',
  'bean_name' => 'HPR_Groups',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_MEMBERS_FROM_HPR_GROUPS_TITLE',
  'id_name' => 'hpr_groups_hpr_group_membershpr_groups_ida',
);
$dictionary["HPR_Group_Members"]["fields"]["hpr_groups_hpr_group_members_name"] = array (
  'name' => 'hpr_groups_hpr_group_members_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_MEMBERS_FROM_HPR_GROUPS_TITLE',
  'save' => true,
  'id_name' => 'hpr_groups_hpr_group_membershpr_groups_ida',
  'link' => 'hpr_groups_hpr_group_members',
  'table' => 'hpr_groups',
  'module' => 'HPR_Groups',
  'rname' => 'name',
);
$dictionary["HPR_Group_Members"]["fields"]["hpr_groups_hpr_group_membershpr_groups_ida"] = array (
  'name' => 'hpr_groups_hpr_group_membershpr_groups_ida',
  'type' => 'link',
  'relationship' => 'hpr_groups_hpr_group_members',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HPR_GROUPS_HPR_GROUP_MEMBERS_FROM_HPR_GROUP_MEMBERS_TITLE',
);
