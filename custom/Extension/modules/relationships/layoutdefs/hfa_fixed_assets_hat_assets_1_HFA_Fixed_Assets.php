<?php
 // created: 2016-08-28 23:51:57
$layout_defs["HFA_Fixed_Assets"]["subpanel_setup"]['hfa_fixed_assets_hat_assets_1'] = array (
  'order' => 100,
  'module' => 'HAT_Assets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HFA_FIXED_ASSETS_HAT_ASSETS_1_FROM_HAT_ASSETS_TITLE',
  'get_subpanel_data' => 'hfa_fixed_assets_hat_assets_1',
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
