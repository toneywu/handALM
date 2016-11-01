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
			'displayParams' =>  array (
              'initial_filter' => '&current_mode=1',//这一行代码是关键，从site对象取值。用initial_filter进行过滤。
              'field_to_name_array' => //这里是从Location选择之后，将Location中可以获取到的一些值复制到对应的字段（与本例主题无关）
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
            'name' => 'a_odf_mark',
            'label' => 'LBL_A_ODF_MARK',
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
			'displayParams' =>  array (
              'initial_filter' => '&current_mode=1',//这一行代码是关键，从site对象取值。用initial_filter进行过滤。
              'field_to_name_array' => //这里是从Location选择之后，将Location中可以获取到的一些值复制到对应的字段（与本例主题无关）
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
            'name' => 'b_odf_mark',
            'label' => 'LBL_B_ODF_MARK',
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
