<?php
$module_name = 'HAA_SSOSets';
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
            'customCode' => '<input type="button" class="button" id="btn_add_config" value="{$MOD.LBL_ADD_CONFIG}">',
            'sugar_html' => 
            array (
              'type' => 'button',
              'value' => '{$MOD.LBL_ADD_CONFIG}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'btn_add_config',
                'title' => '{$MOD.LBL_ADD_CONFIG}',
                /*'onclick' => 'this.form.action.value=\'addToConfigs\';',*/
                'name' => 'Add to Config',
                ),
              ),
            ),
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_SSOSets/js/HAA_SSOSets_detailview.js',
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
