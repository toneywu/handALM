<?php
$module_name = 'HAA_Values';
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
