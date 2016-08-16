<?php
$module_name = 'HAT_Asset_Trans';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'planned_complete_date',
            'label' => 'LBL_PLANNED_COMPLETE_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hat_assets_hat_asset_trans_name',
            'label' => 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE',
          ),
          1 => 
          array (
            'name' => 'target_asset_status',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_ASSET_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'target_location',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_LOCATION',
          ),
          1 => 
          array (
            'name' => 'target_location_desc',
            'label' => 'LBL_TARGET_LOCATION_DESC',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'target_responsible_center',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_RESPONSIBLE_CENTER',
          ),
          1 => 
          array (
            'name' => 'target_responsible_person',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_RESPONSIBLE_PERSON',
          ),
        ),
      ),
    ),
  ),
);
?>
