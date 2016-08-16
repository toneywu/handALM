<?php
$module_name='HAT_Asset_Trans';
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
      'popup_module' => 'HAT_Asset_Trans',
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
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '45%',
      'default' => true,
    ),
    'trans_status' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_TRANS_STATUS',
      'width' => '10%',
      'default' => true,
    ),
    'target_asset_status' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_TARGET_ASSET_STATUS',
      'width' => '10%',
      'default' => true,
    ),
    'target_location' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_TARGET_LOCATION',
      'id' => 'HAT_ASSET_LOCATIONS_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'HAT_Asset_Locations',
      'target_record_key' => 'hat_asset_locations_id_c',
    ),
    'target_location_desc' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_TARGET_LOCATION_DESC',
      'width' => '10%',
      'default' => true,
    ),
    'target_responsible_person' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_TARGET_RESPONSIBLE_PERSON',
      'id' => 'CONTACT_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Contacts',
      'target_record_key' => 'contact_id_c',
    ),
    'target_responsible_center' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_TARGET_RESPONSIBLE_CENTER',
      'id' => 'ACCOUNT_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Accounts',
      'target_record_key' => 'account_id_c',
    ),
  ),
);