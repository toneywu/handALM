<?php
// created: 2016-07-26 11:13:12
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'code_qualification_type' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_QUALIFICATION_TYPE',
    'id' => 'CODE_QUALIFICATION_TYPE_ID',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'code_qualification_type_id',
  ),
  'effective_start_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_EFFECTIVE_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'effective_end_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_EFFECTIVE_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'qual_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_QUAL_STATUS',
    'width' => '10%',
  ),
  'content' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CONTENT',
    'width' => '15%',
    'default' => true,
  ),
  'contact' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CONTACT',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contact_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAA_QUAL',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAA_QUAL',
    'width' => '5%',
    'default' => true,
  ),
);