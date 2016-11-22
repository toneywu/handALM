<?php
// created: 2016-11-17 22:00:50
$subpanel_layout['list_fields'] = array (
  'relate_insurance_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_RELATE_INSURANCE_NUMBER',
    'id' => 'HAOS_INSURANCES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAOS_Insurances',
    'target_record_key' => 'haos_insurances_id_c',
  ),
  'claim_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_CLAIM_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'other_side_amount' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_OTHER_SIDE_AMOUNT',
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
  'actual_amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_ACTUAL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'other_side_act_amt' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_OTHER_SIDE_ACT_AMT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'document_ready_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_DOCUMENT_READY_FLAG',
    'width' => '10%',
  ),
  'premium_payment_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_PREMIUM_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'document_deliver_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_DOCUMENT_DELIVER_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'gap_payment_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_GAP_PAYMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAOS_Insurance_Claims_Lines',
    'width' => '5%',
    'default' => true,
  ),
);