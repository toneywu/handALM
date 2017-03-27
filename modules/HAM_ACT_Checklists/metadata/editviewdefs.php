<?php
$module_name = 'HAM_ACT_Checklists';
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
            'name' => 'value_type',
            'studio' => 'visible',
            'label' => 'LBL_VALUE_TYPE',
          ),
          1 => 
          array (
            'name' => 'ham_act',
            'studio' => 'visible',
            'label' => 'LBL_HAM_ACT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'parent_ham_act_checklists',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_HAM_ACT_CHECKLISTS',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'seq',
            'label' => 'LBL_SEQ',
          ),
          1 => 'name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'method',
            'label' => 'LBL_METHOD',
          ),
          1 => 
          array (
            'name' => 'standard_reference',
            'label' => 'LBL_STANDARD_REFERENCE',
          ),
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'std_min',
            'label' => 'LBL_STD_MIN',
          ),
          1 => 
          array (
            'name' => 'std_max',
            'label' => 'LBL_STD_MAX',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'target',
            'label' => 'LBL_TARGET',
          ),
          1 => 
          array (
            'name' => 'uom',
            'studio' => 'visible',
            'label' => 'LBL_UOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'range_min',
            'label' => 'LBL_RANGE_MIN',
          ),
          1 => 
          array (
            'name' => 'range_max',
            'label' => 'LBL_RANGE_MAX',
          ),
        ),
      ),
    ),
  ),
);
?>
