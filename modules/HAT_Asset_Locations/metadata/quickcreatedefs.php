<?php
$module_name = 'HAT_Asset_Locations';
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
          0 => 
          array (
            'name' => 'maint_site',
            'studio' => 'visible',
            'label' => 'LBL_MAINT_SITE',
          ),
          1 => 
          array (
            'name' => 'hat_asset_locations_hat_asset_locations_name',
            'label' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSET_LOCATIONS_FROM_HAT_ASSET_LOCATIONS_L_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'location_title',
            'label' => 'LBL_LOCATION_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset_node',
            'label' => 'LBL_ASSET_NODE',
          ),
          1 => 
          array (
            'name' => 'maint_node',
            'label' => 'LBL_MAINT_NODE',
          ),
        ),
      ),
    ),
  ),
);
?>
