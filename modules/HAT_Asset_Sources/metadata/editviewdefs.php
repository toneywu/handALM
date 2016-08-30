<?php
$module_name = 'HAT_Asset_Sources';
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
            'name' => 'supplier_org',
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
      ),
    ),
  ),
);
?>
