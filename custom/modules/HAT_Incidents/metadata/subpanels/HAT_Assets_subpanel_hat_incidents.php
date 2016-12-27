<?php
// created: 2016-12-26 20:44:40
$subpanel_layout['list_fields'] = array (
  'event_type' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_EVENT_TYPE',
    'id' => 'HAT_EVENTTYPE_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_EventType',
    'target_record_key' => 'hat_eventtype_id_c',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'asset_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_NUMBER',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'hat_assets_id_c',
  ),
  'event_resp_party' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_EVENT_RESP_PARTY',
    'width' => '10%',
    'default' => true,
  ),
  'person_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PERSON_NUMBER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contact_id_c',
  ),
  'event_date' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_EVENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'event_location' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_EVENT_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
);