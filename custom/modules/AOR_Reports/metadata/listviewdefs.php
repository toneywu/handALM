<?php
$listViewDefs ['AOR_Reports'] = 
array (
  /*'FRAMEWORKS_C' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_FRAMEWORKS',
    'default' => true,
    'link' => true,
    'id' => 'haa_frameworks_id_c',
    'related_fields' => 
    array (
      0 => 'haa_frameworks_id_c',
    ),
  ),*/
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'REPORT_TYPE_C' => 
  array (
    'width' => '10%',
    'label' => 'LBL_REPORT_TYPE',
    'default' => true,
    'link' => true,
  ),
  'EXPORT_TYPE_C' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_EXPORT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'REPORT_MODULE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REPORT_MODULE',
    'width' => '12%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '15%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '15%',
    'default' => false,
  ),
);
?>
