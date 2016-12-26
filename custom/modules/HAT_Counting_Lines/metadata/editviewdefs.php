<?php
$module_name = 'HAT_Counting_Lines';
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
        'LBL_EDITVIEW_PANEL2' => 
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
            'name' => 'counting_task',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_TASK',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+$("#line_framework").val()+"',
              'field_to_name_array' => 
              array (
                'name' => 'counting_task',
                'id' => 'hat_counting_tasks_id_c',
                'counting_person' => 'counting_person',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'counting_person',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_PERSON',
            'customCode' => '<input name="counting_person" id="counting_person" size="30" value="" title="" type="text" readonly>',
          ),
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
              /*'initial_filter' => '&name_advanced="+$("#product").val()+"',*/
              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id_c',
                'description' => 'asset_desc',
                'hat_asset_locations_hat_assets_name' => 'asset_location',
                'hat_asset_locations_hat_assetshat_asset_locations_ida' => 'hat_asset_locations_id_c',
                'owning_org' => 'oranization',
                'owning_org_id' => 'account_id_c',
                'owning_major'=> 'asset_major',
                'owning_major_id' => 'haa_codes_id_c',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'asset_desc',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_DESC',
            'customCode' => '<input name="asset_desc" id="asset_desc" size="30" value="" title="" type="text" readonly>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'counting_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_STATUS',
          ),
          1 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
            'customCode' => '<input name="asset_location" class="sqsEnabled yui-ac-input" tabindex="0" id="asset_location" size="" value="" title="" autocomplete="off" type="text" readonly>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
            'customCode' => '<input name="oranization" class="sqsEnabled yui-ac-input" tabindex="0" id="oranization" size="" value="" title="" autocomplete="off" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_major',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_MAJOR',
            'customCode' => '<input name="asset_major" class="sqsEnabled yui-ac-input" tabindex="0" id="asset_major" size="" value="" title="" autocomplete="off" type="text" readonly>',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_doc_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_DOC_ITEMS',
          ),
        ),
      ),
    ),
  ),
);
?>
