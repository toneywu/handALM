<?php
// created: 2017-02-15 16:55:59
$dictionary["HAA_Integration_System_Def_Lines"]["fields"]["haa_integr7f04m_def_lines"] = array (
  'name' => 'haa_integr7f04m_def_lines',
  'type' => 'link',
  'relationship' => 'haa_integration_system_def_headers_haa_integration_system_def_lines',
  'source' => 'non-db',
  'module' => 'HAA_Integration_System_Def_Headers',
  'bean_name' => 'HAA_Integration_System_Def_Headers',
  'vname' => 'LBL_HAA_INTEGRATION_SYSTEM_DEF_HEADERS_HAA_INTEGRATION_SYSTEM_DEF_LINES_FROM_HAA_INTEGRATION_SYSTEM_DEF_HEADERS_TITLE',
  'id_name' => 'haa_integrc471headers_ida',
);
$dictionary["HAA_Integration_System_Def_Lines"]["fields"]["haa_integre4c8_lines_name"] = array (
  'name' => 'haa_integre4c8_lines_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAA_INTEGRATION_SYSTEM_DEF_HEADERS_HAA_INTEGRATION_SYSTEM_DEF_LINES_FROM_HAA_INTEGRATION_SYSTEM_DEF_HEADERS_TITLE',
  'save' => true,
  'id_name' => 'haa_integrc471headers_ida',
  'link' => 'haa_integr7f04m_def_lines',
  'table' => 'haa_integration_system_def_headers',
  'module' => 'HAA_Integration_System_Def_Headers',
  'rname' => 'name',
);
$dictionary["HAA_Integration_System_Def_Lines"]["fields"]["haa_integrc471headers_ida"] = array (
  'name' => 'haa_integrc471headers_ida',
  'type' => 'link',
  'relationship' => 'haa_integration_system_def_headers_haa_integration_system_def_lines',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAA_INTEGRATION_SYSTEM_DEF_HEADERS_HAA_INTEGRATION_SYSTEM_DEF_LINES_FROM_HAA_INTEGRATION_SYSTEM_DEF_LINES_TITLE',
);
