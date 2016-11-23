<?php
$module_name = 'HAT_Asset_Locations';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
 /*        0 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/detailview_map_point.js',
        ),
       1 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/detailview_treeview.js',
        ),*/
        0 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/detailview_map_point.js',
        ),
        1=>
        array(
           'file' => 'modules/HAT_Assets/js/editview_icon_picker.js',),
        2 => 
        array (
          'file' => 'modules/HAT_Asset_Locations/js/HAT_Asset_Locations_detailview.js',
        ),
      ),
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
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
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL_GIS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
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
          ),
          1 => 
          array (
            'name' => 'code_asset_location_type',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION_TYPE',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 'parent_location',
          1 => 
          array (
            'name' => 'location_icon',
            'label' => 'LBL_ICON',
            'customCode'=>'<i class="zmdi {$fields.location_icon.value} icon-hc-lg "></i> ({$fields.location_icon.value})'

          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
          ),
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
          0 => 'map_type',
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
            'label' => 'LBL_MAP_SEARCH_AREA',
          ),
        ),
        1 => 
        array (
          0 => 'map_layer',
          1 => 
          array (
            'name' => 'map_layer_url',
            'studio' => 'visible',
            'label' => 'LBL_MAP_LAYER_URL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'map_zoom',
            'label' => 'LBL_MAP_ZOOM',
          ),
          1 => 
          array (
            'name' => 'map_lat',
            'label' => 'LBL_MAP_LAT',
			'customCode' => '<input type="hidden" name="map_marker_data" id="map_marker_data"  value="{$fields.map_marker_data.value}" >',
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
            'label' => 'LBL_MAP_DISPLAY_AREA',
            'customCode' => '<div id="cuxMap" style="background-color: #efefef; height: 20px; width: 80%;">map will be loaded here</div><input type="hidden" name="map_layer_url" id="map_layer_url" value="{$fields.map_layer_url.value}">',
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
            'label' => 'LBL_TREEVIEW',
            'customCode' => '<div id="cuxTreeview" ">treeview will be loaded here</div>',
          ),
        ),
      ),*/
    ),
  ),
);
?>
