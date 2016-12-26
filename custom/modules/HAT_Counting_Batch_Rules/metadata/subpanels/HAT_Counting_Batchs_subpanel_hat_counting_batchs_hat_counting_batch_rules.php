<?php
// created: 2016-12-24 16:16:27
$subpanel_layout['list_fields'] = array (
  'org_split_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ORG_SPLIT_FLAG',
    'width' => '6%',
  ),
  'loc_split_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_LOC_SPLIT_FLAG',
    'width' => '6%',
  ),
  'major_split_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_MAJOR_SPLIT_FLAG',
    'width' => '6%',
  ),
  'category_split_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_CATEGORY_SPLIT_FLAG',
    'width' => '6%',
  ),
  'oranization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '12%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
  ),
  'org_drilldown' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ORG_DRILLDOWN',
    'width' => '8%',
  ),
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '12%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id_c',
  ),
  'location_drilldown' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_LOCATION_DRILLDOWN',
    'width' => '8%',
  ),
  'major' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_MAJOR',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id_c',
  ),
  'major_drilldown' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_MAJOR_DRILLDOWN',
    'width' => '8%',
  ),
  'category' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CATEGORY',
    'id' => 'AOS_PRODUCT_CATEGORIES_ID_C',
    'link' => true,
    'width' => '12%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Product_Categories',
    'target_record_key' => 'aos_product_categories_id_c',
  ),
  'category_drilldown' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_CATEGORY_DRILLDOWN',
    'width' => '8%',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Batch_Rules',
    'width' => '5%',
    'default' => true,
  ),
);