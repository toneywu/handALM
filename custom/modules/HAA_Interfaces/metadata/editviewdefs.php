<?php
$module_name = 'HAA_Interfaces';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
        'includes'=>
      array(
        0=>
        array(
          'file'=>'modules/HAA_Interfaces/js/HAA_Interfaces.js',
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
          ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
          ),
         'LBL_EDITVIEW_PANEL3' => 
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
          1 => array (
            'name' => 'based_flag',
            'label' => 'LBL_BASED_FLAG',
            ),
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
          1 => 
          array (
            'name' => 'execute_func_name',
            'label' => 'LBL_EXECUTE_FUNC_NAME',
            ),
          ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'interface_policy',
            'studio' => 'visible',
            'label' => 'LBL_INTERFACE_POLICY',
            ),
          1 => 
          array (
            'name' => 'last_sync_date',
            'label' => 'LBL_LAST_SYNC_DATE',
            'customCode' => '{$fields.last_sync_date.value}',
            ),
          ),
        6 => 
        array (
         0 => 'description',
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
        'LBL_EDITVIEW_PANEL3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'attribute1',
            'label' => 'LBL_ATTRIBUTE1',
            ),
          1 => 
          array (
            'name' => 'attribute2',
            'label' => 'LBL_ATTRIBUTE2',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'attribute3',
            'label' => 'LBL_ATTRIBUTE3',
            ),
          1 => 
          array (
            'name' => 'attribute4',
            'label' => 'LBL_ATTRIBUTE4',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'attribute5',
            'label' => 'LBL_ATTRIBUTE5',
            ),
          1 => 
          array (
            'name' => 'attribute6',
            'label' => 'LBL_ATTRIBUTE6',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'attribute7',
            'label' => 'LBL_ATTRIBUTE7',
            ),
          1 => 
          array (
            'name' => 'attribute8',
            'label' => 'LBL_ATTRIBUTE8',
            ),
          ),
        ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
            ),
          ),
        ),

      ),
    ),
);
?>
