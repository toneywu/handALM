<?php
// created: 2016-06-22 07:59:32
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  /*'linear_start_measure' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_LINEAR_START',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'linear_distance' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_LINEAR_DISTANCE',
    'width' => '10%',
    'default' => true,
  ),
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id',
  ),
  'element_asset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ELEMENT_ASSET',
    'id' => 'PARENT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'element_asset_id',
  ),
  'linear_element_details' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_LINEAR_ELEMENT_DETAILS',
    'width' => '10%',
    'default' => true,
  ),*/
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '50%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Linear_Elements',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Linear_Elements',
    'width' => '5%',
    'default' => true,
  ),
);