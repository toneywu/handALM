<?php
$module_name = 'HAT_Counting_Rule_Dtls';
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
            'name' => 'organization_name',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION_NAME',
          ),
          1 => 
          array (
            'name' => 'counting_obj_type',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_OBJ_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'split_accord',
            'studio' => 'visible',
            'label' => 'LBL_SPLIT_ACCORD',
          ),
          1 => 
          array (
            'name' => 'additional_comment',
            'studio' => 'visible',
            'label' => 'LBL_ADDITIONAL_COMMENT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'default_counter',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_COUNTER',
          ),
          1 => 'description',
        ),
      ),
    ),
  ),
);
?>
