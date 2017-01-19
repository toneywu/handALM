<?php
$module_name = 'HAT_Assets';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        1 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        2 => 
        array (
          'file' => 'modules/HAT_Assets/js/detailview_HAT_Assets.js',
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      /*  'LBL_DETAILVIEW_PANEL7' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),*/
        'LBL_DETAILVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
       /* 'LBL_DETAILVIEW_PANEL5' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),*/
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => true,
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
            'name' => 'asset_group',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_GROUP',
          ),
          1 => 
          array (
            'name' => 'asset_category',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_CATEGORY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_desc',
            'label' => 'LBL_ASSET_DESC',
          ),
          1 => 'name',
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
            'name' => 'enable_linear',
            'label' => 'LBL_ENABLE_LINEAR',
          ),
          1 => 
          array (
            'name' => 'enable_it_ports',
            'label' => 'LBL_ENABLE_IT_PORTS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'enable_vehicle_mgmt',
            'label' => 'LBL_ENABLE_VEHICLE_MGMT',
          ),
          1 => '',
        ),
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'enable_it_rack',
            'label' => 'LBL_ENABLE_IT_RACK',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 'enable_fa',
          1 => 'fixed_asset',
        ),
      ),
/*      'lbl_detailview_panel7' => 
      array (
        0 => 
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
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'linear_reference_method',
            'studio' => 'visible',
            'label' => 'LBL_LINEAR_REFERENCE_METHOD',
          ),
          1 => '',
        ),
      ),*/
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_asset',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_ASSET',
          ),
          1 => 
          array (
            'name' => 'cost_center',
            'studio' => 'visible',
            'label' => 'LBL_COST_CENTER',
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
            'name' => 'owning_org',
            'studio' => 'visible',
            'label' => 'LBL_OWING_ORG',
          ),
          1 => 
          array (
            'name' => 'owning_person',
            'studio' => 'visible',
            'label' => 'LBL_OWNING_PERSON',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'owning_details',
            'label' => 'LBL_OWNING_DETAILS',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'using_org',
            'studio' => 'visible',
            'label' => 'LBL_USING_ORG',
          ),
          1 => 
          array (
            'name' => 'using_person',
            'studio' => 'visible',
            'label' => 'LBL_USING_PERSON',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'using_details',
            'label' => 'LBL_USING_DETAILS',
          ),
          1 => '',
        ),
      ),
      'lbl_detailview_panel2' => 
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
            'name' => 'asset_source_ref',
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
          1 => 
          array (
            'name' => 'invalid_date',
            'label' => 'LBL_INVALID_DATE',
          ),
        ),
        5 => 
        array (
          0 => 'date_entered',
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
      ),
  /*    'lbl_detailview_panel5' => 
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
      ),*/
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 'framework',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_name',
            'label' => 'LBL_ASSET_NAME',
          ),
          1 => '',
        ),
        2 => 
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
        3 => 
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
        4 => 
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
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
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
        9 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
