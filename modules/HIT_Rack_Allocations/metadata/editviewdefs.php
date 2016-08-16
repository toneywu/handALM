<?php
$module_name = 'HIT_Rack_Allocations';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HIT_Rack_Allocations/js/HIT_Racks_Allocations_editview.js',
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
            'name' => 'rack',
            'studio' => 'visible',
            'label' => 'LBL_RACK',
			'customCode'=>'<input type="hidden" id="rack" name="rack" value="{$fields.rack.value}"><input type="hidden" id="hit_racks_id" name="hit_racks_id" value="{$fields.hit_racks_id.value}">{$fields.rack.value}'
          ),
          1 => 'placeholder',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
			'displayParams' => 
            array (
              //'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id',
                'asset_desc' => 'name',
              ),
			 ),
          ),
          1 => 'name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rack_pos_top',
            'label' => 'LBL_RACK_POS_TOP',
          ),
          1 => 
          array (
            'name' => 'height',
            'label' => 'LBL_HEIGHT',
          ),
        ),
        3 => 
        array (
          0 => 'sync_parent_enabled',
          1 => 
          array (
            'name' => 'rack_pos_depth',
            'studio' => 'visible',
            'label' => 'LBL_RACK_POS_DEPTH',
          ),

        ),
        4=>
        array (
          0=>'description',
          1=>''
          ),
      ),
    ),
  ),
);
?>
