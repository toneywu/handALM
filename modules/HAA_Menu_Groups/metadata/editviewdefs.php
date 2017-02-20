<?php
$module_name = 'HAA_Menu_Groups';
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
        'MENUS_LIST_PANEL'=>
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode' => '{$FRAMEWORKS_C}',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'menu_group_code',
            'label' => 'LBL_MENU_GROUP_CODE',
          ),
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
      'MENUS_LIST_PANEL' =>
      array(
        0 => 
        array(
          0 => 
          array(
            'name' => 'line_items',
            'label' => 'LBL_LINE_ITEMS',
            'customCode' => '<span id="line_items_span"></span>',
          ),
        ),
      ),
    ),
  ),
);
?>
