<?php
$module_name = 'HAA_SSOSets';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SSO_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SSO_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'SSO_SYSTEM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SSO_SYSTEM',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
/*  'CERTIFICATE_KEY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERTIFICATE_KEY',
    'width' => '10%',
    'default' => true,
  ),*/
  'SSO_URL' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_SSO_URL',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'DEFAULT_LOGIN_URL' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DEFAULT_LOGIN_URL',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'HTTP_REFERER_URL' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_HTTP_REFERER_URL',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
