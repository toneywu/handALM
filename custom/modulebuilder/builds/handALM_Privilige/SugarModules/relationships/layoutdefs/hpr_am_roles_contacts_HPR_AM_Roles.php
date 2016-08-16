<?php
 // created: 2016-02-09 00:45:28
$layout_defs["HPR_AM_Roles"]["subpanel_setup"]['hpr_am_roles_contacts'] = array (
  'order' => 100,
  'module' => 'Contacts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HPR_AM_ROLES_CONTACTS_FROM_CONTACTS_TITLE',
  'get_subpanel_data' => 'hpr_am_roles_contacts',
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
