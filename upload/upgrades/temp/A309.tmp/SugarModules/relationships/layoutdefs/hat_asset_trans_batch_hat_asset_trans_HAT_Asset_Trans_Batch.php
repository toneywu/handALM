<?php
 // created: 2016-02-08 07:56:34
$layout_defs["HAT_Asset_Trans_Batch"]["subpanel_setup"]['hat_asset_trans_batch_hat_asset_trans'] = array (
  'order' => 100,
  'module' => 'HAT_Asset_Trans',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_ASSET_TRANS_BATCH_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_TITLE',
  'get_subpanel_data' => 'hat_asset_trans_batch_hat_asset_trans',
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
