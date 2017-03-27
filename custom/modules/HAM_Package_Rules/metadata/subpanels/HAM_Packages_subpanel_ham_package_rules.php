<?php
// created: 2017-03-23 13:25:10
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'hat_meter_types' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_METER_TYPES',
    'id' => 'HAT_METER_TYPES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Meter_Types',
    'target_record_key' => 'hat_meter_types_id',
  ),
  'cycle_interval' => 
  array (
    'type' => 'decimal',
    'vname' => 'LBL_INTERVAL',
    'width' => '10%',
    'default' => true,
  ),
  'uom' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_UOM',
    'id' => 'UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_UOM',
    'target_record_key' => 'uom_id',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_Package_Rules',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_Package_Rules',
    'width' => '5%',
    'default' => true,
  ),
);