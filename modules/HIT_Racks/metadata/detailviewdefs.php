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
          'file' => 'modules/HIT_Racks/js/detailview_hit_racks.js',
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
          0 => 'framework',
          1 => 'asset_group',
        ),
        1 =>
        array (
          0 => 'asset_location',
          1 => 'asset_status',
        ),
        2 =>
        array (
          0 => 'asset',
          1 => 'name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'height',
            'label' => 'LBL_HEIGHT',
          ),
          1 => 
          array (
            'name' => 'enable_partial_allocation',
          ),
        ),
        4 => 
        array (
          0 => 'description',
          1 => '',
        ),
        5 => 
        array (
          0 => 'dimension_external',
          1 => 'dimension_internal',
        ),
        6 => 
        array (
          0 => 'rated_current',
          1 => 'standard_power',
        ),
        7 => 
        array (
          0 => 'stock_number',
          1 => 'start_date',
        ),
        8 => 
        array (
          0 => 'asset_source_type',
          1 => 'asset_source',
        ),
        9 => 
        array (
          0 => 'supplier_org',
          1 => 'asset_source_ref',
        ),
        10 => 
        array (
          0 => 'owning_org',
          1 => 'using_org',
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
