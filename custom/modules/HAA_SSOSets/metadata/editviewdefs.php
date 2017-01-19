<?php
$module_name = 'HAA_SSOSets';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_SSOSets/js/HAA_SSOSets_editview.js',
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
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'sso_code',
            'label' => 'LBL_SSO_CODE',
          ),
          1 => 
          array (
            'name' => 'sso_system',
            'studio' => 'visible',
            'label' => 'LBL_SSO_SYSTEM',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=sso_link_system&haa_frameworks_id_advanced="+this.form.{$fields.haa_frameworks_id_c.name}.value+"',
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'certificate_key',
            'label' => 'LBL_CERTIFICATE_KEY',
          ),
          1 => 
          array (
            'name' => 'sso_url',
            'studio' => 'visible',
            'label' => 'LBL_SSO_URL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'default_login_url',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_LOGIN_URL',
          ),
          1 => 
          array (
            'name' => 'http_referer_url',
            'studio' => 'visible',
            'label' => 'LBL_HTTP_REFERER_URL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
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
            'name' => 'keyword1',
            'label' => 'LBL_KEYWORD1',
          ),
          1 => 
          array (
            'name' => 'keyword2',
            'label' => 'LBL_KEYWORD2',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'keyword3',
            'label' => 'LBL_KEYWORD3',
          ),
          1 => 
          array (
            'name' => 'keyword4',
            'label' => 'LBL_KEYWORD4',
          ),
        ),
        2 => 
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
        3 => 
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
        4 => 
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
        5 => 
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
            'label' => 'LBL_EDITVIEW_PANEL2',
          ),
        ),
      ),

    ),
  ),
);
?>
