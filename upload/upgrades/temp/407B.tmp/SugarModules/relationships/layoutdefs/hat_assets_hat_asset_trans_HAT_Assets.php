<?php
 // created: 2016-02-08 07:13:24
$layout_defs["HAT_Assets"]["subpanel_setup"]['hat_assets_hat_asset_trans'] = array (
  'order' => 100,
  'module' => 'HAT_Asset_Trans',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_TITLE',
  'get_subpanel_data' => 'hat_assets_hat_asset_trans',
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
