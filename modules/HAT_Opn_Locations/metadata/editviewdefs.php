<?php
$module_name = 'HAT_Opn_Locations';
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'property',
          1 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'asset_location',
                'id' => 'asset_location_id',
                'location_title' => 'name',
                ),
              
              ),
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'area',
            'label' => 'LBL_AREA',
          ),
          1 => 
          array (
            'name' => 'unit',
            'studio' => 'visible',
            'label' => 'LBL_UNIT',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
