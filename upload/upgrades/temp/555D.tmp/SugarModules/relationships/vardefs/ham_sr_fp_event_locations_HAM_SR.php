<?php
// created: 2016-03-03 09:32:24
$dictionary["HAM_SR"]["fields"]["ham_sr_fp_event_locations"] = array (
  'name' => 'ham_sr_fp_event_locations',
  'type' => 'link',
  'relationship' => 'ham_sr_fp_event_locations',
  'source' => 'non-db',
  'module' => 'FP_Event_Locations',
  'bean_name' => 'FP_Event_Locations',
  'vname' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
  'id_name' => 'ham_sr_fp_event_locationsfp_event_locations_ida',
);
$dictionary["HAM_SR"]["fields"]["ham_sr_fp_event_locations_name"] = array (
  'name' => 'ham_sr_fp_event_locations_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
  'save' => true,
  'id_name' => 'ham_sr_fp_event_locationsfp_event_locations_ida',
  'link' => 'ham_sr_fp_event_locations',
  'table' => 'fp_event_locations',
  'module' => 'FP_Event_Locations',
  'rname' => 'name',
);
$dictionary["HAM_SR"]["fields"]["ham_sr_fp_event_locationsfp_event_locations_ida"] = array (
  'name' => 'ham_sr_fp_event_locationsfp_event_locations_ida',
  'type' => 'link',
  'relationship' => 'ham_sr_fp_event_locations',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_HAM_SR_TITLE',
);
