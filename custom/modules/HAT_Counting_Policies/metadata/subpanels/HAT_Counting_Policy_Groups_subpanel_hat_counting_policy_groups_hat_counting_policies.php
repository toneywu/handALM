<?php
// created: 2017-02-11 19:24:25
$subpanel_layout['list_fields'] = array (
  'split_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SPLIT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'data_populate_sql' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DATA_POPULATE_SQL',
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
  'enabled_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Policies',
    'width' => '5%',
    'default' => true,
  ),
);