<?php
// created: 2016-10-19 15:17:21
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'hit_ip_subnets' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HIT_IP',
    'id' => 'HIT_IP_SUBNETS_ID',
    'link' => true,
    'width' => '20%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HIT_IP_Subnets',
    'target_record_key' => 'hit_ip_subnets_id',
  ),
  'associated_ip' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSOCIATED_IP',
    'width' => '35%',
    'default' => true,
  ),
  'speed_limit' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SPEED_LIMIT',
    'width' => '5%',
    'default' => true,
  ),
  'bandwidth_type' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BANDWIDTH_TYPE',
    'width' => '5%',
    'default' => true,
  ),
  'date_start' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DATE_START',
    'width' => '10%',
    'default' => true,
  ),
  'date_end' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DATE_END',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HIT_IP_Allocations',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HIT_IP_Allocations',
    'width' => '5%',
    'default' => true,
  ),
);