<?php
// created: 2016-08-09 19:50:56
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'reading_this_time' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_READING_THIS_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'meter_uom' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_READING_UOM',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Meter_Readings',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Meter_Readings',
    'width' => '5%',
    'default' => true,
  ),
);