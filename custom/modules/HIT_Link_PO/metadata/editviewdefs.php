<?php
$module_name = 'HIT_Link_PO';
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
          'file' => 'modules/HIT_Link_PO/js/HIT_Link_PO_editview.js',
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
            'name' => 'product_number',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT_NUMBER',
			 'displayParams' =>           
			 array (
              //'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              'field_to_name_array' => //这里是从Location选择之后，将Location中可以获取到的一些值复制到对应的字段（与本例主题无关）
				  array (
					'name' => 'product_number',
					'id' => 'product_id',
					'asset_group' => 'asset_group',
					'tracking_number' => 'line_number',
					'hat_asset_locations_hat_assets_name' => 'asset_location',
				  ),
              //'call_back_function' => 'setLocationPopupReturn', //在选择后会触发JS中的setLocationPopupReturn函数（与本例主题无关）
            ),

          ),
          1 => 
          array (
            'name' => 'asset_group',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_GROUP',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'line_number',
            'studio' => 'visible',
            'label' => 'LBL_LINE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_source',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_SOURCE',
			'displayParams' =>           
			 array (
              //'initial_filter' => '&maint_site_advanced="+encodeURIComponent(document.getElementById("site").value)+"',
              'field_to_name_array' => //这里是从Location选择之后，将Location中可以获取到的一些值复制到对应的字段（与本例主题无关）
				  array (
					'name' => 'asset_source',
					'id' => 'asset_source_id',
					'supplier_desc' => 'vendor',
				  ),
              //'call_back_function' => 'setLocationPopupReturn', //在选择后会触发JS中的setLocationPopupReturn函数（与本例主题无关）
            ),
          ),
          1 => 
          array (
            'name' => 'vendor',
            'studio' => 'visible',
            'label' => 'LBL_VENDOR',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'unit_price',
            'studio' => 'visible',
            'label' => 'LBL_UNIT_PRICE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'total_amount',
            'label' => 'LBL_TOTAL_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'cost_center',
            'studio' => 'visible',
            'label' => 'LBL_COST_CENTER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'bill_unit_of_measure',
            'studio' => 'visible',
            'label' => 'LBL_BILL_UNIT_OF_MEASURE',
          ),
          1 => 
          array (
            'name' => 'bill_quantity',
            'label' => 'LBL_BILL_QUANTITY',
          ),
        ),
      ),
    ),
  ),
);
?>
