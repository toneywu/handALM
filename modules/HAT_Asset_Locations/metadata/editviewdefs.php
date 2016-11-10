<?php
$module_name = 'HAT_Asset_Locations';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form'=>
      array(
       'buttons' =>
        array (
         0 =>
          array(
           'customCode' =>
            '<input title="Save [Alt+S]" accessKey="S" onclick="this.form.action.value=\'Savereturn check_custom_data();" type="submit" name="button" value="'.$GLOBALS['app_strings']['LBL_SAVE_BUTTON_LABEL'].'">',
          ),
         1 =>
          array(
           'customCode' =>
            '<input title="Cancel [Alt+X]" accessKey="X" onclick="this.form.action.value=\'indexthis.form.module.value=\''.$module_nameththis.form.record.value=\'\';" type="submit" name="button" value="'.$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_LABEL'].'">'
          )
        )
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAT_Assets/js/editview_icon_picker.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/editview_map_point.js',
        ),
        2 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/HAT_Asset_Locations_editview.js',
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
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL_GIS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
/*        'LBL_EDITVIEW_PANEL_TREEVIEW' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),*/
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
            'name' => 'maint_site',
            'studio' => 'visible',
            'label' => 'LBL_MAINT_SITE',
            'customCode'=>'{$MAINT_SITE}'
          ),
          1 => 
          array (
            'name' => 'code_asset_location_type',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=asset_location_type',
              'field_to_name_array' => 
              array (
                'name' => 'code_asset_location_type',
                'id' => 'code_asset_location_type_id',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setLocationTypePopupReturn',
            ),
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 =>array (
            'name' => 'parent_location',
            'label' => 'LBL_PARENT_LOCATION',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'parent_location',
                'id' => 'parent_location_id',
              ),
              'call_back_function' => 'setParentLocationPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'location_icon',
            'label' => 'LBL_ICON',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'location_title',
            'label' => 'LBL_LOCATION_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset_node',
            'label' => 'LBL_ASSET_NODE',
          ),
          1 => 
          array (
            'name' => 'maint_node',
            'label' => 'LBL_MAINT_NODE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'map_type',
          ),
          1 => 'inventory_mode',
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
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
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'attribute5',
            'label' => 'LBL_ATTRIBUTE5',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'address_country',
            'label' => 'LBL_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'address_province',
            'label' => 'LBL_PROVINCE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_address',
            'label' => 'LBL_MAP_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'address_zip',
            'label' => 'LBL_ZIP',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_contact1',
            'label' => 'LBL_CONTACT1',
          ),
          1 => 
          array (
            'name' => 'address_contact2',
            'label' => 'LBL_CONTACT2',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'service_org',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_ORG',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel_gis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'map_search_area',
            'studio' => 'visible',
            'label' => 'LBL_MAP_SEARCH_AREA',
            'customCode' => '<input type="text" id="map_search_text" name="map_search_text"/><input type="button" id="btn_map_search" name="btn_map_search" value="Search on Map" size="30";/> <input type="checkbox" id="chk_rewrite_address" checked="true"><lable id="lbl_rewrite_address">Rewrite Address</lable>',
          ),
        ),
        1 => 
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
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'map_marker_type',
            'label' => 'LBL_MAP_MARKER_TYPE',
          ),
        ),
        4 => 
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
/*      'lbl_editview_panel_treeview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'treeview_display_area',
            'studio' => 'visible',
            'label' => 'LBL_TREEVIEW',
            'customCode' => '<div id="cuxTreeview" ">treeview will be loaded here</div>',
          ),
        ),
      ),*/
    ),
  ),
);
?>
