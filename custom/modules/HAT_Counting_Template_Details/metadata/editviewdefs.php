<?php
$module_name = 'HAT_Counting_Template_Details';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'column_name',
            'studio' => 'visible',
            'label' => 'LBL_COLUMN_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'list_name',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_LIST_NAME',
          ),
          1 => 
          array (
            'name' => 'table_names',
            'studio' => 'visible',
            'label' => 'LBL_TABLE_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sort_order',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_SORT_ORDER',
          ),
          1 => 
          array (
            'name' => 'field_type',
            'studio' => 'visible',
            'label' => 'LBL_FIELD_TYPE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'lookup_type',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_LOOKUP_TYPE',
          ),
          1 => 
          array (
            'name' => 'can_edit_flag',
            'label' => 'LBL_CAN_EDIT_FLAG',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'relate_module',
            'studio' => 'visible',
            'label' => 'LBL_RELATE_MODULE',
          ),
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'required_flag',
            'label' => 'LBL_REQUIRED_FLAG',
          ),
          1 => 
          array (
            'name' => 'field_lable',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_FIELD_LABLE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'module_filter',
            'comment' => 'Full text of the note',
            'studio' => 'visible',
            'label' => 'LBL_MODULE_FILTER',
          ),
          1 => 
          array (
            'name' => 'task_template',
            'studio' => 'visible',
            'label' => 'LBL_TASK_TEMPLATE',
          ),
        ),
      ),
    ),
  ),
);
?>
