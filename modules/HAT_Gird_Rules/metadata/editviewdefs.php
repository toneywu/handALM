<?php
$module_name = 'HAT_Gird_Rules';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
        'LBL_EDITVIEW_PANEL1' => 
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
            'name' => 'framework',
            'customCode' => '{$FRAMEWORK}',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'GIRD_NAME',
          ),
            1 =>
                array (
                    'name' => 'code_asset_location_type',
                    'studio' => 'visible',
                    'label' => 'LBL_ASSET_LOCATION_TYPE',
                    'displayParams' =>
                        array (
                            'initial_filter' => '&code_type_advanced=asset_location_type',
                        ),
                )
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'line_layout',
            'label' => 'LBL_LINE_LAYOUT',
          ),
          1 => 
          array (
            'name' => 'line_order',
            'label' => 'LBL_LINE_ORDER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'line_point_order',
            'label' => 'LBL_LINE_POINT_ORDER',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
