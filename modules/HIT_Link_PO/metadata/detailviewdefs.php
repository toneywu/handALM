<?php
$module_name = 'HIT_Link_PO';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
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
            'name' => 'cost_center_dis',
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
