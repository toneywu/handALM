<?php
// created: 2016-07-07 12:38:12
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'qual_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_QUAL_ORG',
    'id' => 'QUAL_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'qual_org_id',
  ),
  'qual_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_QUAL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'effective_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_EFFECTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'qual_result_passed' => 
  array (
    'type' => 'bool',
    'vname' => 'LBL_QUAL_RESULT_PASSED',
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
    'module' => 'HAT_Asset_QUAL_Details',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Asset_QUAL_Details',
    'width' => '5%',
    'default' => true,
  ),
);