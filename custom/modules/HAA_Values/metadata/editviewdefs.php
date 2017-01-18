<?php
$module_name = 'HAA_Values';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_flex_value',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_FLEX_VALUE',
            /*'displayParams' => 
            array (
              'initial_filter' => '&haa_valuesets_id_c_advanced="+this.form.{$fields.haa_valuesets_id_c.name}.value+"',
              'field_to_name_array' => 
              array (
                'flex_value' => 'parent_flex_value',
                'id' => 'haa_values_id_c',
              ),
            ),*/
          ),
          1 => 
          array (
            'name' => 'flex_value_set',
            'studio' => 'visible',
            'label' => 'LBL_FLEX_VALUE_SET',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'flex_value',
            'label' => 'LBL_FLEX_VALUE',
          ),
          1 => 
          array (
            'name' => 'flex_meaning',
            'label' => 'LBL_FLEX_MEANING',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
      ),
    ),
  ),
);
?>
