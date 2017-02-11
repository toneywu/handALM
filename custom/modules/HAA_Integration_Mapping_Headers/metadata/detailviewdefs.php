<?php
$module_name = 'HAA_Integration_Mapping_Headers';
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
      /*'includes' => 
      array (
        1 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        2 => 
        array (
          'file' => 'custom/modules/HAA_Integration_Mapping_Headers/js/HAA_Integration_Mapping_HeadersDetailView.js',
        ),
      ),*/
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL_LINES' => 
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
          ),
          1 => 
          array (
            'name' => 'maping_def_name',
            'studio' => 'visible',
            'label' => 'LBL_MAPING_DEF_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel_lines' => 
     array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_infos',
            'studio' => 'visible',
            'label' => 'LBL_LINE_INFOS',
          ),
        ),
      ),
    ),
  ),
);
?>
