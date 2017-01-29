<?php
// created: 2017-01-22 16:54:03
$subpanel_layout['list_fields'] = array (
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '8%',
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
    'width' => '7%',
  ),
  'oranization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '8%',
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
    'width' => '7%',
  ),
  'using_organization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_USING_ORGANIZATION',
    'id' => 'ACCOUNT_ID_C1',
    'link' => true,
    'width' => '8%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c1',
  ),
  'using_org_drilldown' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_USING_ORG_DRILLDOWN',
    'width' => '7%',
  ),
  'major' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_MAJOR',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '8%',
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
    'width' => '7%',
  ),
  'category' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CATEGORY',
    'id' => 'AOS_PRODUCT_CATEGORIES_ID_C',
    'link' => true,
    'width' => '8%',
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
    'width' => '7%',
  ),
  'user_person' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_USER_PERSON',
    'id' => 'USER_CONTACTS_ID_C',
    'link' => true,
    'width' => '8%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'user_contacts_id_c',
  ),
  'own_person' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_OWN_PERSON',
    'id' => 'OWN_CONTACTS_ID_C',
    'link' => true,
    'width' => '8%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'own_contacts_id_c',
  ),
  'counting_policies' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_POLICIES',
    'id' => 'HAT_COUNTING_POLICIES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Counting_Policies',
    'target_record_key' => 'hat_counting_policies_id_c',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Batch_Rules',
    'width' => '4%',
    'default' => true,
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