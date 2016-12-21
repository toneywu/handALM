<?php
// created: 2016-12-06 11:08:16
$subpanel_layout['list_fields'] = array (
  'organization_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORGANIZATION_NAME',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
  ),
  'counting_obj_type' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_OBJ_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id_c',
  ),
  'split_accord' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SPLIT_ACCORD',
    'width' => '10%',
    'default' => true,
  ),
  'additional_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_ADDITIONAL_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'default_counter' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DEFAULT_COUNTER',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Rule_Dtls',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Rule_Dtls',
    'width' => '5%',
    'default' => true,
  ),
);