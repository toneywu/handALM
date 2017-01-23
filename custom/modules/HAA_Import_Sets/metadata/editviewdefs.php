<?php
$module_name = 'HAA_Import_Sets';
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
          0 => 
          array (
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode' => '{$FRAMEWORK_C}',
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
    ),
  ),
);
?>
