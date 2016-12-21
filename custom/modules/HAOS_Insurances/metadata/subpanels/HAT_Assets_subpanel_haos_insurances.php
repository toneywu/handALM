<?php
// created: 2016-12-20 10:16:59
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
    ),
  'insurance_type' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_INSURANCE_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id_c',
    ),
  'insurance_subtype' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_INSURANCE_SUBTYPE',
    'id' => 'HAA_CODES_ID1_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id1_c',
    ),
  'parent_name' => 
  array (
    'type' => 'parent',
    'studio' => 'visible',
    'vname' => 'LBL_FLEX_RELATE',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
      ),
    'width' => '15%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => 'parent_id',
    ),
  'organization' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ORGANIZATION',
    'width' => '12%',
    'default' => true,
    ),
  'insured_person' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_INSURED_PERSON',
    'width' => '10%',
    'default' => true,
    ),
  'first_beneficiary' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_FIRST_BENEFICIARY',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '12%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
    ),
  'start_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_START_DATE',
    'width' => '12%',
    'default' => true,
    ),
  'end_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_END_DATE',
    'width' => '12%',
    'default' => true,
    ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAOS_Insurances',
    'width' => '4%',
    'default' => true,
    ),
  );