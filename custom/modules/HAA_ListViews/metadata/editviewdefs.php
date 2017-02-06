<?php
$module_name = 'HAA_ListViews';
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
          'file' => 'modules/HAA_ListViews/js/HAA_ListViews_editview.js',
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'listview_code',
            'label' => 'LBL_LISTVIEW_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'data_source_view_name',
            'studio' => 'visible',
            'label' => 'LBL_DATA_SOURCE_VIEW_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'where_clause',
            'studio' => 'visible',
            'label' => 'LBL_WHERE_CLAUSE',
          ),
          1 => 
          array (
            'name' => 'page_rows',
            'label' => 'LBL_PAGE_ROWS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
          1 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sort_column1',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN1',
          ),
          1 => 
          array (
            'name' => 'sort_column1_order',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN1_ORDER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'sort_column2',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN2',
          ),
          1 => 
          array (
            'name' => 'sort_column2_order',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN2_ORDER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sort_column3',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN3',
          ),
          1 => 
          array (
            'name' => 'sort_column3_order',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN3_ORDER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sort_column4',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN4',
          ),
          1 => 
          array (
            'name' => 'sort_column4_order',
            'studio' => 'visible',
            'label' => 'LBL_SORT_COLUMN4_ORDER',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
            ),
          ),
        ),
    ),
  ),
);
?>
