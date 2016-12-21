<?php
// created: 2016-12-19 23:32:59
$subpanel_layout['list_fields'] = array (
  'product' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PRODUCT',
    'id' => 'AOS_PRODUCTS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_id_c',
    ),
  'part_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_PART_NUMBER',
    'width' => '10%',
    'default' => true,
    ),
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
  'counting_status' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_COUNTING_STATUS',
    'width' => '10%',
    'default' => true,
    ),
  'asset_status' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSET_STATUS',
    'width' => '10%',
    'default' => true,
    ),
/*  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
    ),*/
  /*'asset_location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id_c',
  ),
  'location' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'oranization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
    ),*/
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HAT_Counting_Lines',
      'width' => '4%',
      'default' => true,
      ),
/*  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Lines',
    'width' => '5%',
    'default' => true,
    ),*/
    );