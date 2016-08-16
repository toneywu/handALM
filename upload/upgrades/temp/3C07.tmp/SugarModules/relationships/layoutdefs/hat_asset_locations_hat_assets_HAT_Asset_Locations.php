<?php
 // created: 2016-02-07 21:41:56
$layout_defs["HAT_Asset_Locations"]["subpanel_setup"]['hat_asset_locations_hat_assets'] = array (
  'order' => 100,
  'module' => 'HAT_Assets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
  'get_subpanel_data' => 'hat_asset_locations_hat_assets',
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
