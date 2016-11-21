<?php
$module_name = 'HPR_Group_Priviliges';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HPR_Group_Priviliges/js/HPR_Group_Priviliges.js',
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
            'name' => 'module',
            'studio' => 'visible',
            'label' => 'LBL_MODULE',
            'displayParams' =>
            array (
              'call_back_function' => 'setDefaultName',
            ),
          ),
          1 => 
          array (
            'name' => 'group_member',
            'studio' => 'visible',
            'label' => 'LBL_GROUP_MEMBER',
            'displayParams' =>
            array (
              'call_back_function' => 'setDefaultName',
            ),
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
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'studio' => 'visible',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
