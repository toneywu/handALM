<?php
$module_name = 'HAM_Asset_Route_Assignments';
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
            'name' => 'ham_asset_routes',
            'studio' => 'visible',
            'label' => 'LBL_HAM_ASSET_ROUTES',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'costing_weight',
            'label' => 'LBL_COSTING_WEIGHT',
          ),
        ),
      ),
    ),
  ),
);
?>
