<?php
$module_name = 'HIT_Racks';
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
          'file' => 'modules/HIT_Racks/js/editview_hit_racks.js',
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
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORK',
            'customCode' => '{$FRAMEWORK}',
          ),
          1 => 
          array (
            'name' => 'asset_group',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_GROUP',
            'displayParams' =>
            array (
              //'initial_filter' => '&code_type_advanced=asset_location_type',
              'field_to_name_array' =>
              array (
                'name' => 'asset_group',
                'id' => 'aos_products_id',
                'haa_ff_id_c' => 'haa_ff_id',
              ),
              'call_back_function' => 'setAssetGroupPopupReturn',
            ),
            
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
            'displayParams' =>
            array (
              'initial_filter' => '&site_type=J',
            ),
          ),
          1 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset_number',
          ),
          1 => 'name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'height',
            'label' => 'LBL_HEIGHT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'numbering_rule',
            'studio' => 'visible',
            'label' => 'LBL_NUMBERING_RULE',
          ),
          1 => 
          array (
            'name' => 'enable_partial_allocation',
            'label' => 'LBL_ENABLE_PARTIAL_ALLOCATION',
          ),
        ),
        5 => 
        array (
          0 => 'description',
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'dimension_external',
            'label' => 'LBL_DIMENSION_EXTERNAL',
          ),
          1 => 
          array (
            'name' => 'dimension_internal',
            'label' => 'LBL_DIMENSION_INTERNAL',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'rated_current',
            'label' => 'LBL_RATED_CURRENT',
          ),
          1 => 
          array (
            'name' => 'standard_power',
            'label' => 'LBL_STANDARD_POWER',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'stock_number',
            'label' => 'LBL_STOCK_NUMBER',
          ),
          1 => 
          array (
            'name' => 'using_target',
            'label' => 'LBL_USING_TARGET',
          ),
        ),
        9 => 
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
            'studio' => 'visible',
            'label' => 'LBL_ASSET_SOURCE',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'asset_source',
                'id' => 'asset_source_id',
                'received_date' => 'received_date',
                'line_price' => 'original_cost',
                'currency_id' => 'currency_id',
                'supplier_org' => 'supplier_org',
                'supplier_org_id' => 'supplier_org_id',
                'supplier_desc' => 'supplier_desc',
              ),
            ),
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'supplier_org',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER_ORG',
          ),
          1 => 'asset_source_ref',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'received_date',
          ),
          1 => 'start_date',
        ),
        12 => 
        array (
          0 => 'dismiss_date',
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'owning_org',
            'studio' => 'visible',
            'label' => 'LBL_OWING_ORG',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+encodeURIComponent($("#haa_framework").val())+"&asset_using_org=Y',
              'call_back_function' => 'setUsingOrgPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'owning_person',
            'studio' => 'visible',
            'label' => 'LBL_OWNING_PERSON',
            'displayParams' => 
            array (
              'initial_filter' => '&account_name_advanced="+encodeURIComponent($("#owning_org").val())+"',
            ),
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'using_org',
            'studio' => 'visible',
            'label' => 'LBL_USING_ORG',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+encodeURIComponent($("#haa_framework").val())+"&asset_using_org=Y',
              'call_back_function' => 'setUsingOrgPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'using_person',
            'studio' => 'visible',
            'label' => 'LBL_USING_PERSON',
            'displayParams' => 
            array (
              'initial_filter' => '&account_name_advanced="+encodeURIComponent($("#using_org").val())+"',
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
