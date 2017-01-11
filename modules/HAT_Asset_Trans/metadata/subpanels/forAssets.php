<?php
$module_name='HAT_Asset_Trans';
$subpanel_layout = array (

  'where' => '',
  'list_fields' => 
  array (
    'trans_status' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_TRANS_STATUS',
      'width' => '10%',
      'default' => true,
    ),
    'header' => 
    array (
      'vname' => 'LBL_HEADER',
      'width' => '15%',
      'default' => true,
    ),
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '10%',
      'default' => true,
    ),
    'description' => 
    array (
      'studio' => 'visible',
      'vname' => 'LBL_DESCRIPTION',
      'width' => '65%',
      'default' => true,
    ),
  ),
);