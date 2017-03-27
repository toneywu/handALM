<?php
$popupMeta = array (
    'moduleMain' => 'HAM_Asset_Routes',
    'varName' => 'HAM_Asset_Routes',
    'orderBy' => 'ham_asset_routes.name',
    'whereClauses' => array (
  'name' => 'ham_asset_routes.name',
  'site' => 'ham_asset_routes.site',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'site',
),
    'searchdefs' => array (
  'site' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'site',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
),
);
