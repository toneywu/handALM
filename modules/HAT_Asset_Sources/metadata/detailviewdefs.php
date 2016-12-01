<?php
$module_name = 'HAT_Asset_Sources';
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
            'name' => 'framework',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORK',
          ),
          1 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'header_num',
            'label' => 'LBL_HEADER_NUM',
          ),
          1 => 
          array (
            'name' => 'line_num',
            'label' => 'LBL_LINE_NUM',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'item_num',
            'label' => 'LBL_ITEM_NUM',
          ),
          1 => 
          array (
            'name' => 'supplier_desc',
            'studio' => 'visible',
            'label' => 'LBL_SUPPLIER_ORG',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'line_qty',
            'label' => 'LBL_LINE_QTY',
          ),
          1 => 
          array (
            'name' => 'line_price',
            'label' => 'LBL_LINE_PRICE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'received_date',
            'label' => 'LBL_RECEIVED_DATE',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'source_type',
            'label' => 'LBL_SOURCE_TYPE',
          ),
          1 => 
          array (
            'name' => 'source_reference',
            'label' => 'LBL_SOURCE_REFERENCE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'source_id',
            'label' => 'LBL_SOURCE_ID',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
