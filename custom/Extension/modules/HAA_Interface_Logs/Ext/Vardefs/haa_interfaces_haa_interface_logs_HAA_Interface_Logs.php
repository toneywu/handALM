<?php
// created: 2017-01-04 17:45:36
$dictionary["HAA_Interface_Logs"]["fields"]["haa_interfaces_haa_interface_logs"] = array (
  'name' => 'haa_interfaces_haa_interface_logs',
  'type' => 'link',
  'relationship' => 'haa_interfaces_haa_interface_logs',
  'source' => 'non-db',
  'module' => 'HAA_Interfaces',
  'bean_name' => 'HAA_Interfaces',
  'vname' => 'LBL_HAA_INTERFACES_HAA_INTERFACE_LOGS_FROM_HAA_INTERFACES_TITLE',
  'id_name' => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
);
$dictionary["HAA_Interface_Logs"]["fields"]["haa_interfaces_haa_interface_logs_name"] = array (
  'name' => 'haa_interfaces_haa_interface_logs_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_HAA_INTERFACES_HAA_INTERFACE_LOGS_FROM_HAA_INTERFACES_TITLE',
  'save' => true,
  'id_name' => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
  'link' => 'haa_interfaces_haa_interface_logs',
  'table' => 'haa_interfaces',
  'module' => 'HAA_Interfaces',
  'rname' => 'name',
);
$dictionary["HAA_Interface_Logs"]["fields"]["haa_interfaces_haa_interface_logshaa_interfaces_ida"] = array (
  'name' => 'haa_interfaces_haa_interface_logshaa_interfaces_ida',
  'type' => 'link',
  'relationship' => 'haa_interfaces_haa_interface_logs',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_HAA_INTERFACES_HAA_INTERFACE_LOGS_FROM_HAA_INTERFACE_LOGS_TITLE',
);
