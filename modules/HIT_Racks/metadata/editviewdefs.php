<?php
$module_name = 'HIT_Racks';
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
      'syncDetailEditViews' => false,
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
            'displayParams' => 
            array (
              //'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id',
                'asset_desc' => 'name',
              ),
              //'call_back_function' => 'setLocationPopupReturn',
            ),
          ),
          1 => 'name',
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
          1 => '',
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
