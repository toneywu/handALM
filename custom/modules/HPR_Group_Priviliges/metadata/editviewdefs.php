<?php
$module_name = 'HPR_Group_Priviliges';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'modules/HPR_Group_Priviliges/js/HPR_Group_Priviliges.js',
      ),
    ),
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
          1 => 
          array (
            'name' => 'privilige_module',
            'studio' => 'visible',
            'label' => 'LBL_MODULE',
            'displayParams' => 
            array (
              'call_back_function' => 'setDefaultName',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'group_member',
            'studio' => 'visible',
            'label' => 'LBL_GROUP_MEMBER',
            'displayParams' => 
            array (
              'initial_filter' => '&hpr_groups_hpr_group_members_name_advanced="+$("#name").text()+"',
              'call_back_function' => 'setDefaultName',
            ),
          ),
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
          1 => 'description',
        ),
      ),
    ),
  ),
);
?>
