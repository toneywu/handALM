<?php
 // created: 2016-03-01 13:25:46
$layout_defs["HAT_Asset_Locations"]["subpanel_setup"]['hat_systems_hat_asset_locations'] = array (
  'order' => 100,
  'module' => 'HAT_Systems',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_SYSTEMS_HAT_ASSET_LOCATIONS_FROM_HAT_SYSTEMS_TITLE',
  'get_subpanel_data' => 'hat_systems_hat_asset_locations',
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
