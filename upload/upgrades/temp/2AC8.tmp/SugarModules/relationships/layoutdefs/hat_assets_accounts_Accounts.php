<?php
 // created: 2016-02-08 07:53:03
$layout_defs["Accounts"]["subpanel_setup"]['hat_assets_accounts'] = array (
  'order' => 100,
  'module' => 'HAT_Assets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_HAT_ASSETS_TITLE',
  'get_subpanel_data' => 'hat_assets_accounts',
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
