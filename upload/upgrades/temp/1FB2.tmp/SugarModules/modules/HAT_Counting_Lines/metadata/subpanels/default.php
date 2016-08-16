<?php
$module_name='HAT_Counting_Lines';
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
      'popup_module' => 'HAT_Counting_Lines',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'asset' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_ASSET',
      'id' => 'HAT_ASSETS_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'HAT_Assets',
      'target_record_key' => 'hat_assets_id_c',
    ),
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),
    'asset_location' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_ASSET_LOCATION',
      'id' => 'HAT_ASSET_LOCATIONS_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'HAT_Asset_Locations',
      'target_record_key' => 'hat_asset_locations_id_c',
    ),
    'location' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_LOCATION',
      'width' => '10%',
      'default' => true,
    ),
    'oranization' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_ORANIZATION',
      'id' => 'ACCOUNT_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Accounts',
      'target_record_key' => 'account_id_c',
    ),
    'assigned_user_name' => 
    array (
      'link' => true,
      'type' => 'relate',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'id' => 'ASSIGNED_USER_ID',
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Users',
      'target_record_key' => 'assigned_user_id',
    ),
    'edit_button' => 
    array (
      'vname' => 'LBL_EDIT_BUTTON',
      'widget_class' => 'SubPanelEditButton',
      'module' => 'HAT_Counting_Lines',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'vname' => 'LBL_REMOVE',
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'HAT_Counting_Lines',
      'width' => '5%',
      'default' => true,
    ),
  ),
);