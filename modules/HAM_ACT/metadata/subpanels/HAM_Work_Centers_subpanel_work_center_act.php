<?php
// created: 2016-07-16 09:52:40
$subpanel_layout['list_fields'] = array (
  'work_center_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_WORK_CENTER_NUMBER',
    'id' => 'HAM_WORK_ID_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Centers',
    'target_record_key' => 'ham_work_id_id',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'sr_ham_maint_sites_rule' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'SR_HAM_MAINT_SITES_RULE',
    'id' => 'SR_HAM_MAINT_SITES_RULE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Maint_Sites',
    'target_record_key' => 'sr_ham_maint_sites_rule_id',
  ),
  'sr_haa_frameworks_rule' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_SR_HAA_FRAMEWORKS_RULE',
    'id' => 'SR_HAA_FRAMEWORKS_RULE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Frameworks',
    'target_record_key' => 'sr_haa_frameworks_rule_id',
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
    'module' => 'HAM_ACT',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_ACT',
    'width' => '5%',
    'default' => true,
  ),
);