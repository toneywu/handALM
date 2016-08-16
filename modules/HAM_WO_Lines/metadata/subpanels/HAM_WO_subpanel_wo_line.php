<?php
// created: 2016-07-31 20:45:13
$subpanel_layout['list_fields'] = array (
  'contract' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CONTRACT',
    'id' => 'CONTRACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Contracts',
    'target_record_key' => 'contract_id',
  ),
  'product' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PRODUCT',
    'id' => 'PRODUCT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'product_id',
  ),
  'quantity' => 
  array (
    'type' => 'decimal',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'uom_code' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_UOM_CODE',
    'id' => 'UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_UOM',
    'target_record_key' => 'uom_id',
  ),
  'asset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET',
    'id' => 'ASSET_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'asset_id',
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
    'module' => 'HAM_WO_Lines',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_WO_Lines',
    'width' => '5%',
    'default' => true,
  ),
);