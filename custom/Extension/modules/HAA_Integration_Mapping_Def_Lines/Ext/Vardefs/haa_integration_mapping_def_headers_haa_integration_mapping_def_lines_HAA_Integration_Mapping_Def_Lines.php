<?php
// created: 2017-02-15 16:55:57
$dictionary["HAA_Integration_Mapping_Def_Lines"]["fields"]["haa_integr105ag_def_lines"] = array (
  'name' => 'haa_integr105ag_def_lines',
  'type' => 'link',
  'relationship' => 'haa_integration_mapping_def_headers_haa_integration_mapping_def_lines',
  'source' => 'non-db',
  'module' => 'HAA_Integration_Mapping_Def_Headers',
  'bean_name' => 'HAA_Integration_Mapping_Def_Headers',
  'vname' => 'LBL_HAA_INTEGRATION_MAPPING_DEF_HEADERS_HAA_INTEGRATION_MAPPING_DEF_LINES_FROM_HAA_INTEGRATION_MAPPING_DEF_HEADERS_TITLE',
  'id_name' => 'haa_integr33edheaders_ida',
);
$dictionary["HAA_Integration_Mapping_Def_Lines"]["fields"]["haa_integr3172_lines_name"] = array (
  'name' => 'haa_integr3172_lines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAA_INTEGRATION_MAPPING_DEF_HEADERS_HAA_INTEGRATION_MAPPING_DEF_LINES_FROM_HAA_INTEGRATION_MAPPING_DEF_HEADERS_TITLE',
  'save' => true,
  'id_name' => 'haa_integr33edheaders_ida',
  'link' => 'haa_integr105ag_def_lines',
  'table' => 'haa_integration_mapping_def_headers',
  'module' => 'HAA_Integration_Mapping_Def_Headers',
  'rname' => 'name',
);
$dictionary["HAA_Integration_Mapping_Def_Lines"]["fields"]["haa_integr33edheaders_ida"] = array (
  'name' => 'haa_integr33edheaders_ida',
  'type' => 'link',
  'relationship' => 'haa_integration_mapping_def_headers_haa_integration_mapping_def_lines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAA_INTEGRATION_MAPPING_DEF_HEADERS_HAA_INTEGRATION_MAPPING_DEF_LINES_FROM_HAA_INTEGRATION_MAPPING_DEF_LINES_TITLE',
);
