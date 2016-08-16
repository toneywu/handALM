<?php
 // created: 2016-02-08 17:35:05
$layout_defs["HPR_AM_Users"]["subpanel_setup"]['hpr_am_roles_hpr_am_users'] = array (
  'order' => 100,
  'module' => 'HPR_AM_Roles',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HPR_AM_ROLES_HPR_AM_USERS_FROM_HPR_AM_ROLES_TITLE',
  'get_subpanel_data' => 'hpr_am_roles_hpr_am_users',
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
