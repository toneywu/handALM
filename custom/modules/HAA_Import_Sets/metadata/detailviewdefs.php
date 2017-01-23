<?php
$module_name = 'HAA_Import_Sets';
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
          4 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="but_validate()" value="{$MOD.LBL_VALIDATE}">',
          ),
          5 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="but_import()" value="{$MOD.LBL_IMPORT}">',
          ),
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_Import_Sets/js/HAA_Import_Sets_detailview.js',
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
      'syncDetailEditViews' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
       /* 'useTabs' => true,
      'tabDefs' => 
      array(*/
        /*'LBL_IMPORT_DATAS1' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_IMPORT_DATAS2' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),*/
       /* 'LBL_IMPORT_DATAS3' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),*//*),*/
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
            'name' => 'imp_func_code',
            'label' => 'LBL_IMP_FUNC_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'exec_file_name',
            'label' => 'LBL_EXEC_FILE_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'validate_func_name',
            'label' => 'LBL_VALIDATE_FUNC_NAME',
          ),
          1 => 
          array (
            'name' => 'import_func_name',
            'label' => 'LBL_IMPORT_FUNC_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'backup_flag',
            'label' => 'LBL_BACKUP_FLAG',
          ),
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'document_id_c',
            'label' => 'LBL_DOCUMENT_ID_C',
          ),
          1 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'label' => 'LBL_LINE_ITEMS',
          ),
        ),
      ),
      /*'lbl_import_datas1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'import_datas',
            'label' => 'LBL_IMPORT_DATAS',
          ),
        ),
      ),
      'lbl_import_datas2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'import_datas',
            'label' => 'LBL_IMPORT_DATAS',
          ),
        ),
      ),*/
      /*'lbl_import_datas3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'import_datas',
            'label' => 'LBL_IMPORT_DATAS',
          ),
        ),
      ),*/
    ),
  ),
);
?>
