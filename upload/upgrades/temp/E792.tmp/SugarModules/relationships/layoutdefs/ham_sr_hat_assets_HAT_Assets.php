<?php
 // created: 2016-03-03 09:54:43
$layout_defs["HAT_Assets"]["subpanel_setup"]['ham_sr_hat_assets'] = array (
  'order' => 100,
  'module' => 'HAM_SR',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAM_SR_TITLE',
  'get_subpanel_data' => 'ham_sr_hat_assets',
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
