<?php
$module_name = 'HAA_ValueSets';
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
          'file' => 'modules/HAA_ValueSets/js/HAA_ValueSets_editview.js',
          ),
        ),
      'maxColumns' => '3',
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
        2 => 
        array (
          'label' => '10',
          'field' => '30',
          ),
        ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_EDITVIEW_PANEL0' => 
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
        ),
      ),
    'panels' => 
    array (
      'lbl_editview_panel0' => 
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
          1 => '',
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'valueset_type',
            'studio' => 'visible',
            'label' => 'LBL_VALUESET_TYPE',
            ),
          1 => 'name',
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'format_type',
            'studio' => 'visible',
            'label' => 'LBL_FORMAT_TYPE',
            ),
          1 => 
          array (
            'name' => 'maximum_size',
            'label' => 'LBL_MAXIMUM_SIZE',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'number_precision',
            'label' => 'LBL_NUMBER_PRECISION',
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
            'name' => 'application_table_name',
            'studio' => 'visible',
            'label' => 'LBL_APPLICATION_TABLE_NAME',
            ),
          
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'value_column_name',
            'label' => 'LBL_VALUE_COLUMN_NAME',
            ),
          1 => 
          array (
            'name' => 'value_column_type',
            'studio' => 'visible',
            'label' => 'LBL_VALUE_COLUMN_TYPE',
            ),
          2 => 
          array (
            'name' => 'value_column_size',
            'label' => 'LBL_VALUE_COLUMN_SIZE',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'id_column_name',
            'label' => 'LBL_ID_COLUMN_NAME',
            ),
          1 => 
          array (
            'name' => 'id_column_type',
            'studio' => 'visible',
            'label' => 'LBL_ID_COLUMN_TYPE',
            ),
          2 => 
          array (
            'name' => 'id_column_size',
            'label' => 'LBL_ID_COLUMN_SIZE',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'meaning_column_name',
            'label' => 'LBL_MEANING_COLUMN_NAME',
            ),
          1 => 
          array (
            'name' => 'meaning_column_type',
            'studio' => 'visible',
            'label' => 'LBL_MEANING_COLUMN_TYPE',
            ),
          2 => 
          array (
            'name' => 'meaning_column_size',
            'label' => 'LBL_MEANING_COLUMN_SIZE',
            ),
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'additional_where_clause',
            'studio' => 'visible',
            'label' => 'LBL_ADDITIONAL_WHERE_CLAUSE',
            ),
          1 => 
          array (
            'name' => 'additional_quickpick_columns',
            'studio' => 'visible',
            'label' => 'LBL_ADDITIONAL_QUICKPICK_COLUMNS',
            ),
          ),
        ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_flex_value_set',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_FLEX_VALUE_SET',
            'displayParams' => 
            array (
              'initial_filter' => '&valueset_type_advanced=I&haa_frameworks_id_c_advanced="+this.form.{$fields.haa_frameworks_id_c.name}.value+"',
              'field_to_name_array' => 
              array (
                'name' => 'parent_flex_value_set',
                'id' => 'haa_valuesets_id_c',
                'description' => 'parent_flex_value_set_desc',
                ),
              ),
            ),
          1 => 
          array (
            'name' => 'parent_flex_value_set_desc',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_FLEX_VALUE_SET_DESC',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'dependant_default_value',
            'label' => 'LBL_DEPENDANT_DEFAULT_VALUE',
            ),
          1 => 
          array (
            'name' => 'dependant_default_value_desc',
            'label' => 'LBL_DEPENDANT_DEFAULT_VALUE_DESC',
            ),
          ),
        ),
      'lbl_editview_panel3' => 
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
