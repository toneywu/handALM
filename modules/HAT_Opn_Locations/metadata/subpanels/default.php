<?php
$module_name='HAT_Opn_Locations';
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
      'popup_module' => 'HAT_Opn_Location',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'type' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_TYPE',
      'width' => '10%',
      'default' => true,
    ),

    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '25%',
      'default' => true,
    ),
    'asset_location' => 
    array (
      'vname' => 'LBL_NAME',
      'width' => '25%',
      'default' => true,
    ),   
    'area' => 
    array (
      'type' => 'decimal',
      'vname' => 'LBL_AREA',
      'width' => '10%',
      'default' => true,
    ),
    'unit' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_UNIT',
      'width' => '15%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HAT_Opn_Location',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'vname' => 'LBL_REMOVE',
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HAT_Opn_Location',
      'width' => '5%',
      'default' => true,
    ),
  ),
);