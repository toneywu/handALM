<?php
// created: 2017-01-22 16:15:59
$subpanel_layout['list_fields'] = array (
  'line_number' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_LINE_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
/*  'mapping_def_header' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_MAPPING_DEF_HEADER',
    'id' => 'HAA_INTEGRATION_MAPPING_DEF_HEADERS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Integration_Mapping_Def_Headers',
    'target_record_key' => 'haa_integration_mapping_def_headers_id_c',
  ),*/
  'segment_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SEGMENT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'map_segment_name' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_MAP_SEGMENT_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'maping_segment_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_MAPING_SEGMENT_NAME',
    'id' => 'HAA_INTEGRATION_SYSTEM_DEF_LINES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Integration_System_Def_Lines',
    'target_record_key' => 'haa_integration_system_def_lines_id_c',
  ),
  'maping_segment_title' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_MAPING_SEGMENT_TITLE',
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
  'description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAA_Integration_Mapping_Def_Lines',
    'width' => '5%',
    'default' => true,
  ),
);