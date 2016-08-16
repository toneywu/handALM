<?php
$module_name = 'HIT_Racks';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HIT_Racks/js/detialview_hit_racks.js',
        ),
      ),
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset',
          ),
          1 => 'asset_desc',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'height',
            'label' => 'LBL_HEIGHT',
          ),
          1 => 
          array (
            'name' => 'depth',
            'label' => 'LBL_DEPTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'numbering_rule',
            'studio' => 'visible',
            'label' => 'LBL_NUMBERING_RULE',
          ),
          1 => 'hat_assets_accounts_name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'asset_status',
            'link' => false,
          ),
          1 => 'hat_asset_locations',
        ),
        4 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'occupation',
            'studio' => 'visible',
            'label' => 'LBL_OCCUPATION',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 'position_display_area',
        ),
      ),
    ),
  ),
);
?>
