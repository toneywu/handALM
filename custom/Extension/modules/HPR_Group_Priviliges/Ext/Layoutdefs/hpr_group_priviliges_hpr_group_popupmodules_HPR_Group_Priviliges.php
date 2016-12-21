<?php
 // created: 2016-12-20 20:44:37
$layout_defs["HPR_Group_Priviliges"]["subpanel_setup"]['hpr_group_priviliges_hpr_group_popupmodules'] = array (
  'order' => 100,
  'module' => 'HPR_Group_PopupModules',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HPR_GROUP_PRIVILIGES_HPR_GROUP_POPUPMODULES_FROM_HPR_GROUP_POPUPMODULES_TITLE',
  'get_subpanel_data' => 'hpr_group_priviliges_hpr_group_popupmodules',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
