<?php
$module_name = 'HAM_SR';
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
          'file' => 'modules/HAM_SR/js/editview_map_point.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAM_SR/js/HAM_SR_editview.js',
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
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
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
            'name' => 'sr_number',
            'label' => 'LBL_SR_NUMBER',
            'customCode' => '{$SR_NUMBER}',
          ),
          1 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
            'customCode' => '{$MAINT_SITE}',
          ),
        ),
        1 => 
        array (
          0 => 'name',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'sr_status',
            'studio' => 'visible',
            'label' => 'LBL_SR_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'reported_date',
            'label' => 'LBL_REPORTED_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
            'displayParams' => 
            array (
              'initial_filter' => '&maint_site_advanced="+encodeURIComponent($("#site_select option:selected").html())+"',
              'field_to_name_array' => 
              array (
                'name' => 'location',
                'id' => 'hat_asset_locations_id',
                'location_title' => 'location_desc',
                'map_zoom' => 'map_zoom',
                'map_lat' => 'map_lat',
                'map_lng' => 'map_lng',
                'map_address' => 'map_search_text',
                'map_type' => 'map_type',
                'map_enabled' => 'location_map_enabled',
              ),
              'call_back_function' => 'setLocationPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'asset',
            'displayParams' => 
            array (
              'initial_filter' => '&hat_asset_locations_hat_assets_name_advanced="+encodeURIComponent(document.getElementById("location").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id',
                'asset_desc' => 'asset_desc',
                'location_desc' => 'location_extra_desc',
              ),
              'call_back_function' => 'setAssetPopupReturn',
            ),
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'location_extra_desc',
            'label' => 'LBL_LOCATION_EXTRA_DESC',
          ),
          1 => 
          array (
            'name' => 'map_enabled',
            'studio' => 'visible',
            'label' => 'LBL_MAPS_ENABLED',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'map_search_area',
            'studio' => 'visible',
            'label' => 'LBL_MAP_SEARCH_AREA',
            'customCode' => '<input type="text" id="map_search_text" name="map_search_text"/><input type="button" id="btn_map_search" name="btn_map_search" value="Search on Map" size="30";/> <input type="checkbox" id="chk_rewrite_address" checked="true">Rewrite Address',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_type',
            'studio' => 'visible',
            'label' => 'LBL_MAP_TYPE',
          ),
          1 => 
          array (
            'name' => 'map_zoom',
            'studio' => 'visible',
            'label' => 'LBL_MAP_ZOOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'map_lat',
            'label' => 'LBL_MAP_LAT',
            'precision' => '8',
          ),
          1 => 
          array (
            'name' => 'map_lng',
            'label' => 'LBL_MAP_LNG',
            'precision' => '8',
          ),
        ),
        3 => 
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
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'reporter_org',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER_ORG',
          ),
          1 => 
          array (
            'name' => 'reporter',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER',
            'displayParams' => 
            array (
              'initial_filter' => '&account_name_advanced="+encodeURIComponent(document.getElementById("reporter_org").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'reporter',
                'id' => 'contact_id',
                'account_name' => 'reporter_org',
                'account_id' => 'account_id',
                'phone_work' => 'work_phone',
                'phone_mobile' => 'mobile',
                'email1' => 'email',
              ),
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'work_phone',
            'label' => 'LBL_WORK_PHONE',
          ),
          1 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'contact_by',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_BY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'contact_notes',
            'label' => 'LBL_CONTACT_NOTES',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'owned_org',
            'studio' => 'visible',
            'label' => 'LBL_OWNED_ORG',
          ),
          1 => 
          array (
            'name' => 'owned_by',
            'studio' => 'visible',
            'label' => 'LBL_OWNED_BY',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'worklog',
            'label' => 'LBL_WORKLOG',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'closed_date',
            'label' => 'LBL_CLOSED_DATE',
          ),
          1 => 
          array (
            'name' => 'closed_by',
            'studio' => 'visible',
            'label' => 'LBL_CLOSED_BY',
          ),
        ),
      ),
    ),
  ),
);
?>
