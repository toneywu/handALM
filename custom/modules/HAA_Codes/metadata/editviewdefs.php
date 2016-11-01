<?php
$module_name = 'HAA_Codes';
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
            'customCode' => '{$FRAMEWORK}',
          ),
          1=>''
        ),
        1 => 
        array (
          0 => 'code_module',
          1 => 
          array (
            'name' => 'code_type',
            'studio' => 'visible',
            'label' => 'LBL_CODE_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'haa_ff',
            'studio' => 'visible',
            'label' => 'LBL_HAA_FF',
          ),
          1 => 
          array (
            'name' => 'code_tag',
            'label' => 'LBL_CODE_TAG',
          ),
        ),
        4 => 
        array (
          0 => array (
            'name' => 'parent_type_value',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_TYPE_VALUE',
            'displayParams' =>
            array (
              'initial_filter' => '&code_type_advanced="+this.form.{$fields.code_type.name}.value+"',
            )
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
