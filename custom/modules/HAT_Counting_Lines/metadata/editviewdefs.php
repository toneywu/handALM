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
            'name' => 'counting_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_STATUS',
          ),
          1 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
            'customCode' => '<input name="asset_location" class="sqsEnabled yui-ac-input" tabindex="0" id="asset_location" size="" value="" title="" autocomplete="off" type="text" readonly>
              <input name="hat_asset_locations_id_c" id="hat_asset_locations_id_c" value="" type="hidden">',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
            'customCode' => '<input name="oranization" class="sqsEnabled yui-ac-input" tabindex="0" id="oranization" size="" value="" title="" autocomplete="off" type="text" readonly>
            <input name="account_id_c" id="account_id_c" value="" type="hidden">',
          ),
          1 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
            'customCode' => '<select id="asset_status_d" name="asset_status_d" title="" disabled="disabled">
<option label="" value=""></option>
<option label="购置未交付" value="Ordered">购置未交付</option>
<option label="已收货未启用" value="Received">已收货未启用</option>
<option label="空闲/库存" value="Stocked" >空闲/库存</option>
<option label="空闲/可用" value="Idle">空闲/可用</option>
<option label="预分配启用" value="PreAssigned">预分配启用</option>
<option label="在用" value="InService">在用</option>
<option label="外部" value="TempOut">外部</option>
<option label="已退役" value="OutOfService">已退役</option>
<option label="已处置/迁出" value="Discard">已处置/迁出</option>
</select><input type="hidden" id="asset_status" name="asset_status" value=""/>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_major',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_MAJOR',
            'customCode' => '<input name="asset_major" class="sqsEnabled yui-ac-input" tabindex="0" id="asset_major" size="" value="" title="" autocomplete="off" type="text" readonly>
            <input name="haa_codes_id_c" id="haa_codes_id_c" value="" type="hidden">',
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
