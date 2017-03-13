<?php
$module_name = 'HAT_Asset_Trans_Batch';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
      ),
      'asset_trans_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ASSET_TRANS_STATUS',
        'width' => '10%',
        'name' => 'asset_trans_status',
      ),
      'current_owning_org' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_CURRENT_OWNING_ORG',
        'id' => 'CURRENT_OWNING_ORG_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'current_owning_org',
      ),
      'owner_contacts' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_OWNER',
        'id' => 'owner_id',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'owner_contacts',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
      ),
      'owner_contacts' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_OWNER',
        'id' => 'owner_id',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'owner_contacts',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
