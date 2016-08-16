<?php
 // created: 2016-03-30 21:37:42
$layout_defs["HAT_Properties"]["subpanel_setup"]['hat_properties_hat_opn_locations'] = array (
  'order' => 100,
  'module' => 'HAT_Opn_Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_PROPERTIES_HAT_OPN_LOCATIONS_FROM_HAT_OPN_LOCATIONS_TITLE',
  'get_subpanel_data' => 'hat_properties_hat_opn_locations',
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
