<?php
$module_name = 'HAT_Assets';
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
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAT_Assets/js/editview_icon_picker.js',
        ),
        2 => 
        array (
          'file' => 'modules/HAT_Assets/js/editview_HAT_Assets.js',
        ),
        3 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/editview_map_point.js',
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
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL6' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL7' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL_GIS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
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
            'name' => 'framework',
            'customCode' => '{$FRAMEWORK}',
          ),
          1 => 
          array (
            'name' => 'asset_group',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_GROUP',
            'displayParams' => 
            array (
              'initial_filter' => '&type_advanced=Good',
              'field_to_name_array' => 
              array (
                'name' => 'asset_group',
                'id' => 'aos_products_id',
                'aos_product_category_name' => 'asset_category',
                'aos_product_category_id' => 'aos_product_categories_id',
                'asset_name_rule_c' => 'asset_name_rule_c',
                'haa_ff_id_c' => 'haa_ff_id_c',
              ),
              'call_back_function' => 'setProductPopupReturn',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hfa_fixed_assets_hat_assets_1_name',
          ),
          1 => 
          array (
            'name' => 'hfa_fixed_assets_hat_assets_1_name',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_category',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_CATEGORY',
          ),
          1 => 'asset_icon',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_name_rule',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_NAME_RULE',
          ),
          1 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'customCode' => '<input type="text" id="name" name="name" value="{$fields.name.value}"><input type="hidden" id="asset_name_rule_c" name="asset_name_rule_c"><input type="hidden" id="haa_ff_id_c" name="haa_ff_id_c">',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset_number',
            'label' => 'LBL_ASSET_NUMBER',
          ),
          1 => 
          array (
            'name' => 'serial_number',
            'label' => 'LBL_SERIAL_NUMBER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tracking_number',
            'label' => 'LBL_TRACKING_NUMBER',
          ),
          1 => 
          array (
            'name' => 'maintainable',
            'label' => 'LBL_MAINTAINABLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_name',
            'label' => 'LBL_ASSET_NAME',
          ),
          1 => 
          array (
            'name' => 'asset_desc',
            'label' => 'LBL_ASSET_DESC',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'brand',
            'label' => 'LBL_BRAND',
          ),
          1 => 
          array (
            'name' => 'model',
            'label' => 'LBL_MODEL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'enable_linear',
            'label' => 'LBL_ENABLE_LINEAR',
          ),
          1 => 
          array (
            'name' => 'enable_it_ports',
            'label' => 'LBL_ENABLE_IT_PORTS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'enable_vehicle_mgmt',
            'label' => 'LBL_ENABLE_VEHICLE_MGMT',
          ),
          1 => 'enable_it_rack',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'vin',
            'label' => 'LBL_VIN',
          ),
          1 => 
          array (
            'name' => 'engine_num',
            'label' => 'LBL_ENGINE_NUM',
          ),
        ),
        9=> array(
          0=>'enable_fa',
          1=>'fixed_asset'
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'weight',
            'label' => 'LBL_WEIGHT',
          ),
          1 => 
          array (
            'name' => 'size',
            'label' => 'LBL_SIZE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'attribute1',
            'label' => 'LBL_ATTRIBUTE1',
          ),
          1 => 
          array (
            'name' => 'attribute2',
            'label' => 'LBL_ATTRIBUTE2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'attribute3',
            'label' => 'LBL_ATTRIBUTE3',
          ),
          1 => 
          array (
            'name' => 'attribute4',
            'label' => 'LBL_ATTRIBUTE4',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'attribute5',
            'label' => 'LBL_ATTRIBUTE5',
          ),
          1 => 
          array (
            'name' => 'attribute6',
            'label' => 'LBL_ATTRIBUTE6',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'attribute7',
            'label' => 'LBL_ATTRIBUTE7',
          ),
          1 => 
          array (
            'name' => 'attribute8',
            'label' => 'LBL_ATTRIBUTE8',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'attribute9',
            'label' => 'LBL_ATTRIBUTE9',
          ),
          1 => 
          array (
            'name' => 'attribute10',
            'label' => 'LBL_ATTRIBUTE10',
          ),
        ),
      ),
      'lbl_editview_panel7' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'linear_reference_method',
            'studio' => 'visible',
            'label' => 'LBL_LINEAR_REFERENCE_METHOD',
          ),
          1 => 
          array (
            'name' => 'linear_length',
            'studio' => 'visible',
            'label' => 'LBL_LINEAR_LENGTH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'linear_start_measure',
            'label' => 'LBL_LINEAR_START',
          ),
          1 => 
          array (
            'name' => 'linear_start_desc',
            'label' => 'LBL_LINEAR_START_DESC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'linear_end_measure',
            'label' => 'LBL_LINEAR_END',
          ),
          1 => 
          array (
            'name' => 'linear_end_desc',
            'label' => 'LBL_LINEAR_END_DESC',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_source_type',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_TYPE',
          ),
          1 => 
          array (
            'name' => 'asset_source',
            'label' => 'LBL_SOURCE_REF',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'supplier_org',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER_ORG',
          ),
          1 => 
          array (
            'name' => 'asset_source_details',
            'label' => 'LBL_SOURCE_DETAILS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
          1 => 
          array (
            'name' => 'original_cost',
            'label' => 'LBL_PRIGINAL_COST',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'received_date',
            'label' => 'LBL_RECEIVED_DATE',
          ),
          1 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'dismiss_date',
            'label' => 'LBL_DISMISS_DATE',
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'warranty_type',
            'studio' => 'visible',
            'label' => 'LBL_WARRANTY_TYPE',
          ),
          1 => 
          array (
            'name' => 'warranty_expire_date',
            'label' => 'LBL_WARRANTY_EXPIRE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_asset',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_ASSET',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
          ),
          1 => 
          array (
            'name' => 'asset_criticality',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_CRITICALITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hat_asset_locations_hat_assets_name',
          ),
          1 => 
          array (
            'name' => 'location_desc',
            'label' => 'LBL_LOCATION_DESC',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'use_location_gis',
            'label' => 'LBL_USE_LOCATION_GIS',
          ),
          1 => 
          array (
            'name' => 'map_type',
            'studio' => 'visible',
            'label' => 'LBL_MAP_TYPE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'owning_org',
            'studio' => 'visible',
            'label' => 'LBL_OWING_ORG',
          ),
          1 => 
          array (
            'name' => 'owning_details',
            'label' => 'LBL_OWNING_DETAILS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'owning_person',
            'studio' => 'visible',
            'label' => 'LBL_OWNING_PERSON',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'using_org',
            'studio' => 'visible',
            'label' => 'LBL_USING_ORG',
          ),
          1 => 
          array (
            'name' => 'using_details',
            'label' => 'LBL_USING_DETAILS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'using_person',
            'studio' => 'visible',
            'label' => 'LBL_USING_PERSON',
          ),
        ),
      ),
      'lbl_editview_panel_gis' => 
      array (
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_search_area',
            'studio' => 'visible',
            'label' => 'LBL_MAP_SEARCH_AREA',
            'customCode' => '<input type="text" id="map_search_text" name="map_search_text"/><input type="button" id="btn_map_search" name="btn_map_search" value="Search on Map" size="30";/> <input type="checkbox" id="chk_rewrite_address" checked="true"><lable id="lbl_rewrite_address">Rewrite Address</lable>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'map_layer',
            'studio' => 'visible',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'map_layer',
                'id' => 'map_layer_id',
                'map_file' => 'map_layer_url',
              ),
              'call_back_function' => 'setMapLayerPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'map_layer_url',
            'label' => '',
            'customCode' => '<input type="hidden" name="map_layer_url" id="map_layer_url" value="{$fields.map_layer_url.value}">',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'map_zoom',
            'studio' => 'visible',
            'label' => 'LBL_MAP_ZOOM',
          ),
          1 => 
          array (
            'name' => 'map_lat',
            'label' => 'LBL_MAP_LAT_LNG',
            'customCode' => '<input type="text" name="map_lat" id="map_lat"  maxlength="11" value="{$fields.map_lat.value}" title="" tabindex="0" size="11">, <input type="text" name="map_lng" id="map_lng" maxlength="11" value="{$fields.map_lng.value}" title="" tabindex="0" size="11"><input type="hidden" name="map_marker_data" id="map_marker_data"  value="{$fields.map_marker_data.value}" title="" tabindex="0" >',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'map_marker_type',
            'label' => 'LBL_MAP_MARKER_TYPE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'map_display_area',
            'studio' => 'visible',
            'label' => 'LBL_MAP_DISPLAY_AREA',
            'customCode' => '<div id="cuxMap" style="background-color: #efefef; ">map will be loaded here</div>',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'description',
          1=>''
        ),
      ),
    ),
  ),
);
?>
