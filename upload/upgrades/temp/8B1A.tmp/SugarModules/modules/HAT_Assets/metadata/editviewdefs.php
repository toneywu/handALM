<?php
$module_name = 'HAT_Assets';
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
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'asset_desc',
            'label' => 'LBL_ASSET_DESC',
          ),
        ),
        1 => 
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
        2 => 
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
            'name' => 'brand',
            'label' => 'LBL_BRAND',
          ),
          1 => 
          array (
            'name' => 'model',
            'label' => 'LBL_MODEL',
          ),
        ),
        5 => 
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
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'source_type',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_TYPE',
          ),
          1 => 
          array (
            'name' => 'source_ref',
            'label' => 'LBL_SOURCE_REF',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'dismiss_date',
            'label' => 'LBL_DISMISS_DATE',
          ),
          1 => 
          array (
            'name' => 'invalid_date',
            'label' => 'LBL_INVALID_DATE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
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
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'hat_assets_accounts_name',
          ),
          1 => 
          array (
            'name' => 'hat_assets_contacts_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
