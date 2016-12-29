<?php
$module_name = 'HAA_Interfaces';
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
        'LBL_EDITVIEW_PANEL1' => 
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
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=interface_link_system',
            ),
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
          1 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
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
          0 => '',
          1 => '',
        ),
        2 => 
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
        3 => 
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
