<?php
$module_name = 'HPR_Group_Priviliges';
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
            'name' => 'privilige_module',
            'studio' => 'visible',
            'label' => 'LBL_MODULE',
          ),
          1 => 
          array (
            'name' => 'group_member',
            'studio' => 'visible',
            'label' => 'LBL_GROUP_MEMBER',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'sql_statement_for_listview',
            'studio' => 'visible',
            'label' => 'LBL_SQL_STATEMENT_FOR_LISTVIEW',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
          1 => 
          array(
            'name' => 'popup_global_flag',
            'label' => 'LBL_POPUP_GLOBAL_FLAG',
          ),
        ),
        3 =>
        array(
          0 => 
          array(
            'name' => 'sql_statement_for_popup',
            'label' => 'LBL_SQL_STATEMENT_FOR_POPUP',
          ),
          1 => 'description',
        ),
      ),
    ),
  ),
);
?>
