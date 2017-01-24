<?php
// created: 2017-01-19 17:24:01
$subpanel_layout['list_fields'] = array (
  'line_number' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_LINE_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'column_title' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_COLUMN_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'column_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COLUMN_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'column_name' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COLUMN_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'column_data_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COLUMN_DATA_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'column_length' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_COLUMN_LENGTH',
    'width' => '10%',
    'default' => true,
  ),
  'validate_valueset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_VALIDATE_VALUESET',
    'id' => 'HAA_VALUESETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_ValueSets',
    'target_record_key' => 'haa_valuesets_id_c',
  ),
  'column_mask' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_COLUMN_MASK',
    'width' => '10%',
    'default' => true,
  ),
  'required_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_REQUIRED_FLAG',
    'width' => '10%',
  ),
 /* 'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAA_Integration_System_Def_Lines',
    'width' => '4%',
    'default' => true,
  ),*/
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
    'module' => 'HAA_Integration_System_Def_Lines',
    'width' => '5%',
    'default' => true,
  ),
);