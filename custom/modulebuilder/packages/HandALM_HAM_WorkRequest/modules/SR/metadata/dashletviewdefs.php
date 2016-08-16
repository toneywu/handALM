<?php
$dashletData['HAM_SRDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['HAM_SRDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'ham_sr_hat_assets_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_HAT_ASSETS_FROM_HAT_ASSETS_TITLE',
    'id' => 'HAM_SR_HAT_ASSETSHAT_ASSETS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'priority' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'sr_number' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SR_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'ham_sr_fp_event_locations_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAM_SR_FP_EVENT_LOCATIONS_FROM_FP_EVENT_LOCATIONS_TITLE',
    'id' => 'HAM_SR_FP_EVENT_LOCATIONSFP_EVENT_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'reporter' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_REPORTER',
    'id' => 'CONTACT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'sr_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_SR_STATUS',
    'width' => '10%',
    'default' => false,
  ),
  'site' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'FP_EVENT_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
