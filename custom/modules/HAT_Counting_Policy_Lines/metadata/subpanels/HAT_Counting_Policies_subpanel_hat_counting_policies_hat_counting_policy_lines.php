<?php
// created: 2017-02-11 19:23:48
$subpanel_layout['list_fields'] = array (
  'seq' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_SEQ',
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
  'group_clause' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_GROUP_CLAUSE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'additional_logic' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_ADDITIONAL_LOGIC',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'task_templates' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_TASK_TEMPLATES',
    'id' => 'HAT_COUNTING_TASK_TEMPLATES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Counting_Task_Templates',
    'target_record_key' => 'hat_counting_task_templates_id_c',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Policy_Lines',
    'width' => '5%',
    'default' => true,
  ),
);