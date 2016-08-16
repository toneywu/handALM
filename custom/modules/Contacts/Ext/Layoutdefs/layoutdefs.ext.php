<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2016-02-08 10:53:31
$layout_defs["Contacts"]["subpanel_setup"]['hat_assets_contacts'] = array (
  'order' => 100,
  'module' => 'HAT_Assets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_ASSETS_CONTACTS_FROM_HAT_ASSETS_TITLE',
  'get_subpanel_data' => 'hat_assets_contacts',
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


 // created: 2016-02-09 00:45:28
$layout_defs["Contacts"]["subpanel_setup"]['hpr_am_roles_contacts'] = array (
  'order' => 100,
  'module' => 'HPR_AM_Roles',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HPR_AM_ROLES_CONTACTS_FROM_HPR_AM_ROLES_TITLE',
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


//auto-generated file DO NOT EDIT
$layout_defs['Contacts']['subpanel_setup']['hpr_am_roles_contacts']['override_subpanel_name'] = 'Contact_subpanel_hpr_am_roles_contacts';

?>