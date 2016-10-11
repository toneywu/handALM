<?php
// created: 2016-09-08 08:47:54
$subpanel_layout['list_fields'] = array (
  'trans_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_TRANS_STATUS',
    'width' => '5%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '6%',
    'default' => true,
  ),
  'target_asset_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_TARGET_ASSET_STATUS',
    'width' => '8%',
    'default' => true,
  ),
  'target_location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_TARGET_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id',
  ),
  'target_location_desc' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TARGET_LOCATION_DESC',
    'width' => '12%',
    'default' => true,
  ),
);