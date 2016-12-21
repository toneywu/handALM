<?php
// created: 2016-12-20 20:44:37
$dictionary["HPR_Group_PopupModules"]["fields"]["hpr_group_priviliges_hpr_group_popupmodules"] = array (
  'name' => 'hpr_group_priviliges_hpr_group_popupmodules',
  'type' => 'link',
  'relationship' => 'hpr_group_priviliges_hpr_group_popupmodules',
  'source' => 'non-db',
  'module' => 'HPR_Group_Priviliges',
  'bean_name' => 'HPR_Group_Priviliges',
  'vname' => 'LBL_HPR_GROUP_PRIVILIGES_HPR_GROUP_POPUPMODULES_FROM_HPR_GROUP_PRIVILIGES_TITLE',
  'id_name' => 'hpr_group_dcbfviliges_ida',
);
$dictionary["HPR_Group_PopupModules"]["fields"]["hpr_group_priviliges_hpr_group_popupmodules_name"] = array (
  'name' => 'hpr_group_priviliges_hpr_group_popupmodules_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HPR_GROUP_PRIVILIGES_HPR_GROUP_POPUPMODULES_FROM_HPR_GROUP_PRIVILIGES_TITLE',
  'save' => true,
  'id_name' => 'hpr_group_dcbfviliges_ida',
  'link' => 'hpr_group_priviliges_hpr_group_popupmodules',
  'table' => 'hpr_group_priviliges',
  'module' => 'HPR_Group_Priviliges',
  'rname' => 'name',
);
$dictionary["HPR_Group_PopupModules"]["fields"]["hpr_group_dcbfviliges_ida"] = array (
  'name' => 'hpr_group_dcbfviliges_ida',
  'type' => 'link',
  'relationship' => 'hpr_group_priviliges_hpr_group_popupmodules',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HPR_GROUP_PRIVILIGES_HPR_GROUP_POPUPMODULES_FROM_HPR_GROUP_POPUPMODULES_TITLE',
);
