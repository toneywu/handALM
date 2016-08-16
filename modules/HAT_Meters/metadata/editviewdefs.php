<?php
$module_name = 'HAT_Meters';
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
          'file' => 'modules/HAT_Meters/js/HAT_Meters_editview.js',
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
            'name' => 'domain',
            'studio' => 'visible',
            'label' => 'LBL_DOMAIN',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hat_asset_location',
            'studio' => 'visible',
            'label' => 'LBL_HAT_ASSET_LOCATION',
            'displayParams' => 
            array (
             // 'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              'call_back_function' => 'setAssetPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
            'displayParams' => 
            array (
              'initial_filter' => '&hat_asset_locations_hat_assets_name_advanced="+encodeURIComponent(document.getElementById("hat_asset_location").value)+"',
/*              'field_to_name_array' => 
              array (
                'name' => 'asset',
                'id' => 'hat_assets_id',
                //'asset_desc' => 'asset_desc',
                //'location_desc' => 'location_extra_desc',
              ),*/
              'call_back_function' => 'setAssetPopupReturn',
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'meter_type',
            'studio' => 'visible',
            'label' => 'LBL_METER_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&domain_advanced="+encodeURIComponent(document.getElementById("domain").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'meter_type',
                'id' => 'meter_type_id',
                'haa_uom' => 'meter_uom',
              ),
              'call_back_function' => 'setMeterTypePopupReturn',
            ),
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'latest_reading',
            'label' => 'LBL_LATEST_READING',
          ),
          1 => 
          array (
            'name' => 'meter_uom',
            'studio' => 'visible',
            'label' => 'LBL_METER_UOM',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'reading_date',
            'label' => 'LBL_READING_DATE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
