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
    'acctual_complete_date' => 
    array (
      'vname' => 'LBL_ACCTUAL_COMPLETE_DATE',
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