<?php
$popupMeta = array (
    'moduleMain' => 'User',
    'varName' => 'USER',
    'orderBy' => 'user_name',
    'whereClauses' => array (
  'last_name' => 'users.last_name',
  'user_name' => 'users.user_name',
  'email' => 'users.email',
  'contact_organization_c' => 'users.contact_organization_c',
),
    'searchInputs' => array (
  1 => 'last_name',
  2 => 'user_name',
  5 => 'email',
  6 => 'contact_organization_c',
),
    'searchdefs' => array (
  'user_name' => 
  array (
    'name' => 'user_name',
    'width' => '10%',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'label' => 'LBL_ANY_EMAIL',
    'type' => 'name',
    'width' => '10%',
  ),
  'contact_organization_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_ORGANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'contact_organization_c',
  ),
),
);
