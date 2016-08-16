<?php
// created: 2016-06-25 17:39:16
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '10%',
    'default' => true,
  ),
  'lastest_qual_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_LASTEST_QUAL_ORG',
    'id' => 'LASTEST_QUAL_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'lastest_qual_org_id',
  ),
  'latest_qual_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_LATEST_QUAL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'latest_effective_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_LATEST_EFFECTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Asset_QUAL',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Asset_QUAL',
    'width' => '5%',
    'default' => true,
  ),
);