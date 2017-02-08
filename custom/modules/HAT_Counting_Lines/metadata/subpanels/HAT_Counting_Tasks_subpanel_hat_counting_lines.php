<?php
// created: 2017-02-04 16:32:20
$subpanel_layout['list_fields'] = array (
  'asset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'hat_assets_id_c',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'counting_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Lines',
    'width' => '4%',
    'default' => true,
  ),
);