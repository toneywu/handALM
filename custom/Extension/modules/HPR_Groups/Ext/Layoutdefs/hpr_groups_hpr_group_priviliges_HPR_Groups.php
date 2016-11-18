<?php
 // created: 2016-11-18 15:23:20
$layout_defs["HPR_Groups"]["subpanel_setup"]['hpr_groups_hpr_group_priviliges'] = array (
  'order' => 100,
  'module' => 'HPR_Group_Priviliges',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HPR_GROUPS_HPR_GROUP_PRIVILIGES_FROM_HPR_GROUP_PRIVILIGES_TITLE',
  'get_subpanel_data' => 'hpr_groups_hpr_group_priviliges',
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
