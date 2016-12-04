<?php
// created: 2016-12-03 19:15:17
$subpanel_layout['list_fields'] = array (
  'claim_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CLAIM_NUMBER',
    'width' => '7%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'claim_type' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CLAIM_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '7%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id_c',
  ),
  'claim_treated_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_CLAIM_TREATED_STATUS',
    'width' => '7%',
    'default' => true,
  ),
  'relate_event_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_RELATE_EVENT_NUMBER',
    'id' => 'HAT_INCIDENTS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Incidents',
    'target_record_key' => 'hat_incidents_id_c',
  ),
  'relate_wo_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_RELATE_WO_NUMBER',
    'id' => 'HAM_WO_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_WO',
    'target_record_key' => 'ham_wo_id_c',
  ),
  'claim_total_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_CLAIM_TOTAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'act_claim_total_amt' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_ACT_CLAIM_TOTAL_AMT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'gap_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_GAP_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
);