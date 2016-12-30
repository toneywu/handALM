<?php
$module_name = 'HAA_Interfaces';
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
            'customCode' => '<input type="submit" class="button" onClick="this.form.action.value=\'executeSync\';" value="{$MOD.LBL_EXECUTE_SYNC}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_EXECUTE_SYNC}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'executeSyncButton',
                'title' => '{$MOD.LBL_EXECUTE_SYNC}',
                'onclick' => 'this.form.action.value=\'executeSync\';',
                'name' => 'Execute Sync',
                ),
              ),
            ),
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
        'LBL_DETAILVIEW_PANEL1' => 
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
          1 => '',
          ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'interface_code',
            'label' => 'LBL_INTERFACE_CODE',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'link_system',
            'studio' => 'visible',
            'label' => 'LBL_LINK_SYSTEM',
            ),
          1 => 
          array (
            'name' => 'interface_type',
            'studio' => 'visible',
            'label' => 'LBL_INTERFACE_TYPE',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'own_module',
            'studio' => 'visible',
            'label' => 'LBL_OWN_MODULE',
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
            'name' => 'execute_func_files',
            'label' => 'LBL_EXECUTE_FUNC_FILES',
            ),
          1 => array (
            'name' => 'execute_func_name',
            'label' => 'LBL_EXECUTE_FUNC_NAME',
            ),
          ),
        5 => 
        array (
          0 => 'description',
          ),
        ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'auth_user_name',
            'label' => 'LBL_AUTH_USER_NAME',
            ),
          1 => 
          array (
            'name' => 'auth_key',
            'label' => 'LBL_AUTH_KEY',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'service_url',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_URL',
            ),
          1 => 
          array (
            'name' => 'parameter_info',
            'studio' => 'visible',
            'label' => 'LBL_PARAMETER_INFO',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'request_sample',
            'studio' => 'visible',
            'label' => 'LBL_REQUEST_SAMPLE',
            ),
          1 => '',
          ),
        ),
      ),
    ),
);
?>
