<?php
// created: 2016-12-01 18:01:41
$subpanel_layout['list_fields'] = array (
  'revenue_quote_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_REVENUE_QUOTE_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'event_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_EVENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'due_date'=>
  array (
    'type' => 'date',
    'vname' => 'LBL_DUE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'deposit_flag'=>
  array (
    'type' => 'bool',
    'vname' => 'LBL_DEPOSIT_FLAG',
    'width' => '10%',
    'default' => true,
  ),
  'prepay_flag'=>
  array (
    'type' => 'bool',
    'vname' => 'LBL_PREPAY_FLAG',
    'width' => '10%',
    'default' => true,
  ),
  'total_price'=>
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_TOTAL_PRICE',
    'width' => '10%',
    'default' => true,
  ),
  'clear_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_CLEAR_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'CLEARED_STATUS'=>
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_CLEARED_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  // 'due_date' => 
  // array (
  //   'type' => 'date',
  //   'vname' => 'LBL_DUE_DATE',
  //   'width' => '10%',
  //   'default' => true,
  // ),
/*  'product_total_price' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PRODUCT_TOTAL_PRICE',
    'id' => 'ID',
    'link' => true,
    'width' => '20%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products_Quotes',
    'target_record_key' => 'parent_id',
  ),*/
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAOS_Revenues_Quotes',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAOS_Revenues_Quotes',
    'width' => '5%',
    'default' => true,
  ),
);