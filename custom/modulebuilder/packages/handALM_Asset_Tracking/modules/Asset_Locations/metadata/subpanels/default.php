<?php
$module_name='HAT_Asset_Locations';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'HAT_Asset_Locations',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),
    'location_title' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_LOCATION_TITLE',
      'width' => '10%',
      'default' => true,
    ),
    'asset_node' => 
    array (
      'type' => 'bool',
      'default' => true,
      'vname' => 'LBL_ASSET_NODE',
      'width' => '10%',
    ),
    'maint_node' => 
    array (
      'type' => 'bool',
      'default' => true,
      'vname' => 'LBL_MAINT_NODE',
      'width' => '10%',
    ),
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '45%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HAT_Asset_Locations',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'vname' => 'LBL_REMOVE',
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HAT_Asset_Locations',
      'width' => '5%',
      'default' => true,
    ),
  ),
);