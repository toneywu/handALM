<?php
// created: 2016-10-19 10:01:53
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'occupation' => 
  array (
    'type' => 'vchar',
    'studio' => 'visible',
    'vname' => 'LBL_OCCUPATION',
    'width' => '15%',
    'default' => true,
  ),
  'height' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_HEIGHT',
    'width' => '5%',
    'default' => true,
  ),
  'asset_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_STATUS',
    'width' => '15%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HIT_Racks',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HIT_Racks',
    'width' => '5%',
    'default' => true,
  ),
);