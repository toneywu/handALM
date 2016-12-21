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
        'LBL_EDITVIEW_PANEL1'=>
        array(
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
      'LBL_EDITVIEW_PANEL1'=>
      array(
        0 => 
        array(
          0 =>
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
            'customCode'=>'<span id="line_items_span"></span>',
          ),
        ),
      ),
    ),
  ),
);
?>
