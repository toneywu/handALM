<?php
$module_name = 'HIT_ODF_REL';
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
          'file' => 'modules/HIT_ODF_REL/js/hit_odf_rel_editview.js',
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
            'name' => 'jump_number',
            'label' => 'LBL_JUMP_NUMBER',
            'customCode' => '{$JUMP_NUMBER}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'odf_user',
            'label' => 'LBL_ODF_USER',
          ),
          1 => 
          array (
            'name' => 'odf_user_content',
            'label' => 'LBL_ODF_USER_CONTENT',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'a_hat_asset_locations',
            'studio' => 'visible',
            'label' => 'LBL_A_HAT_ASSET_LOCATIONS',
          ),
          1 => 
          array (
            'name' => 'a_hit_racks',
            'studio' => 'visible',
            'label' => 'LBL_A_HIT_RACKS',
            'displayParams' => 
            array (
              'initial_filter' => '&current_mode=1',
              'field_to_name_array' => 
              array (
                'name' => 'a_hit_racks',
                'id' => 'a_hit_racks_id',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'a_odf_mark_name',
            'studio' => 'visible',
            'label' => 'LBL_A_ODF_MARK_NAME',
			'displayParams' => 
            array (
              //'initial_filter' => '&current_mode=1',
              'field_to_name_array' => 
              array (
                'attribute5' => 'a_odf_mark_name',
				'attribute9' => 'b_odf_mark_name',
				'id' => 'a_odf_mark',
              ),
			   'call_back_function' => 'setAODFMarkNameReturn',
            ),
			
          ),
          1 => 
          array (
            'name' => 'a_odf_cores',
            'label' => 'LBL_A_ODF_CORES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'a_odf_rack_nums',
            'label' => 'LBL_A_ODF_RACK_NUMS',
          ),
          1 => 
          array (
            'name' => 'a_odf_assets',
            'studio' => 'visible',
            'label' => 'LBL_A_ODF_ASSETS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'a_odf_ports',
            'label' => 'LBL_A_ODF_PORTS',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'b_hat_asset_locations',
            'studio' => 'visible',
            'label' => 'LBL_B_HAT_ASSET_LOCATIONS',
          ),
          1 => 
          array (
            'name' => 'b_hit_racks',
            'studio' => 'visible',
            'label' => 'LBL_B_HIT_RACKS',
            'displayParams' => 
            array (
              'initial_filter' => '&current_mode=1',
              'field_to_name_array' => 
              array (
                'name' => 'b_hit_racks',
                'id' => 'b_hit_racks_id',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'b_odf_mark_name',
            'studio' => 'visible',
            'label' => 'LBL_B_ODF_MARK_NAME',
			'displayParams' => 
            array (
              //'initial_filter' => '&current_mode=1',
              'field_to_name_array' => 
              array (
                'attribute9' => 'b_odf_mark_name',
				 'attribute5' => 'a_odf_mark_name',
				'id' => 'b_odf_mark',
              ),
			  'call_back_function' => 'setBODFMarkNameReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'b_odf_cores',
            'label' => 'LBL_B_ODF_CORES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'b_odf_rack_nums',
            'label' => 'LBL_B_ODF_RACK_NUMS',
          ),
          1 => 
          array (
            'name' => 'b_odf_assets',
            'studio' => 'visible',
            'label' => 'LBL_B_ODF_ASSETS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'b_odf_ports',
            'label' => 'LBL_B_ODF_PORTS',
          ),
        ),
      ),
    ),
  ),
);
?>
