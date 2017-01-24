<?php
$module_name = 'HAT_Counting_Lines';
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
          'file' => 'custom/modules/HAT_Counting_Lines/js/get_display.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAT_Counting_Lines/js/HAT_Counting_Lines_editview.js',
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
        'LBL_EDITVIEW_PANEL3' => 
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
                'hat_asset_locations_id_c' => 'loc_attr',
                'account_id_c' => 'org_attr',
                'haa_codes_id_c' => 'major_attr',
                'aos_product_categories_id_c' => 'category_attr',
                'user_contacts_id_c' => 'user_attr',
                'own_contacts_id_c' => 'own_attr',
                'hat_counting_task_templates_id_c' => 'task_template_attr',
              ),
              'call_back_function' => 'setExtendValReturn',
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
              'initial_filter' => '&hat_asset_locations_hat_assetshat_asset_locations_ida_advanced="+$("#loc_attr").val()+"&owning_org_id_advanced="+$("#org_attr").val()+"&owning_major_id_advanced="+$("#major_attr").val()+"&aos_product_categories_id_advanced="+$("#category_attr").val()+"&using_person_id_advanced="+$("#user_attr").val()+"&owning_person_id_advanced="+$("#own_attr").val()+"',
              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id_c',
                'asset_desc' => 'asset_desc',
                'hat_asset_locations_hat_assets_name' => 'asset_location',
                'hat_asset_locations_hat_assetshat_asset_locations_ida' => 'hat_asset_locations_id_c',
                'owning_org' => 'oranization',
                'owning_org_id' => 'account_id_c',
                'owning_major' => 'asset_major',
                'owning_major_id' => 'haa_codes_id_c',
                'asset_status' => 'asset_status_d',
                'using_person_desc' => 'user_person',
                'using_person_id' => 'user_contacts_id_c',
                'owning_person_desc' => 'own_person',
                'owning_person_id' => 'own_contacts_id_c',
                'fixed_asset' => 'fixed_asset',
                'fixed_asset_id' => 'fixed_asset_id',
              ),
              'call_back_function' => 'get_display',
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
            'name' => 'fixed_asset',
            'studio' => 'visible',
            'label' => 'LBL_FIXED_ASSET',
            'customCode' => '<input name="fixed_asset" class="sqsEnabled yui-ac-input" tabindex="0" id="fixed_asset" size="" value="" title="" autocomplete="off" type="text" readonly>
            <input name="fixed_asset_id" id="fixed_asset_id" value="" type="hidden">',
          ),
          1 => 
          array (
            'name' => 'counting_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_STATUS',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_asset_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ASSET_ITEMS',
            'customCode' => '<span id="line_asset_items_span"></span>',
          ),
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
            'customCode' => '<span id="line_items_span"></span>',
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
            'customCode' => '<span id="line_doc_items_span"></span>',
          ),
        ),
      ),
    ),
  ),
);
?>
