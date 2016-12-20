<?php
$viewdefs ['Contacts'] = 
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
            'customCode' => '<input type="submit" class="button" title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" onclick="this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}"/>',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'manage_subscriptions_button',
                'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'onclick' => 'this.form.return_module.value=\'Contacts\'; this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Contacts\';',
                'name' => 'Manage Subscriptions',
                ),
              ),
            ),
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
            ),
          'AOP_CREATE' => 
          array (
            'customCode' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'createPortalUser\';" value="{$MOD.LBL_CREATE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_CREATE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_CREATE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'createPortalUser\';',
                'name' => 'buttonCreatePortalUser',
                'id' => 'createPortalUser_button',
                ),
              'template' => '{if !$fields.joomla_account_id.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
          'AOP_DISABLE' => 
          array (
            'customCode' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'disablePortalUser\';" value="{$MOD.LBL_DISABLE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_DISABLE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'disablePortalUser\';',
                'name' => 'buttonDisablePortalUser',
                'id' => 'disablePortalUser_button',
                ),
              'template' => '{if $fields.joomla_account_id.value && !$fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
          'AOP_ENABLE' => 
          array (
            'customCode' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}<input type="submit" class="button" onClick="this.form.action.value=\'enablePortalUser\';" value="{$MOD.LBL_ENABLE_PORTAL_USER}"> {/if}',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_ENABLE_PORTAL_USER}',
                'class' => 'button',
                'onclick' => 'this.form.action.value=\'enablePortalUser\';',
                'name' => 'buttonENablePortalUser',
                'id' => 'enablePortalUser_button',
                ),
              'template' => '{if $fields.joomla_account_id.value && $fields.portal_account_disabled.value && $AOP_PORTAL_ENABLED}[CONTENT]{/if}',
              ),
            ),
          ),
),
'includes' => 
array (
  0 => 
  array (
    'file' => 'modules/Leads/Lead.js',
    ),
  1 => 
  array (
    'file' => 'custom/modules/Contacts/js/ContactsDetailView.js',
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
'useTabs' => true,
'tabDefs' => 
array (
  'DEFAULT' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),
  'LBL_CONTACT_INFORMATION' => 
  array (
    'newTab' => false,
    'panelDefault' => 'expanded',
    ),
  'LBL_EDITVIEW_PANEL2' => 
  array (
    'newTab' => false,
    'panelDefault' => 'expanded',
    ),
  'LBL_PANEL_ADVANCED' => 
  array (
    'newTab' => false,
    'panelDefault' => 'expanded',
    ),
  /*'LBL_PANEL_ASSIGNMENT' => 
  array (
    'newTab' => false,
    'panelDefault' => 'expanded',
    ),*/
/*  'LBL_DETAILVIEW_PANEL_ORG' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),*/
 /* 'LBL_DETAILVIEW_PANEL_HISTORY' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),*/

  'LBL_DETAILVIEW_PANEL_DOC' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),
  'LBL_DETAILVIEW_PANEL_BUSINESS' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),
/*  'LBL_DETAILVIEW_PANEL_ASSETS' => 
  array (
    'newTab' => true,
    'panelDefault' => 'expanded',
    ),*/

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
        'name' => 'framework_c',
        'studio' => 'visible',
        'label' => 'LBL_FRAMEWORK',
        ),
      1 => 
      array (
        'name' => 'people_type_c',
        'studio' => 'visible',
        'label' => 'LBL_PEOPLE_TYPE',
        ),
      ),
    ),
  'lbl_contact_information' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'name' => 'last_name',
        'comment' => 'Last name of the contact',
        'label' => 'LBL_LAST_NAME',
        ),
      1 => 
      array (
        'name' => 'status_c',
        'studio' => 'visible',
        'label' => 'LBL_STATUS',
        ),
      ),
    1 => 
    array (
     0 => 
     array (
      'name' => 'sex_c',
      'studio' => 'visible',
      'label' => 'LBL_SEX',
      ),
     1 => 
     array (
      'name' => 'countries_c',
      'studio' => 'visible',
      'label' => 'LBL_COUNTRIES',
      ),
     ),
    2 => 
    array (
      0 => 
      array (
        'name' => 'salutation_c',
        'studio' => 'visible',
        'label' => 'LBL_SALUTATION_C',
        ),
      1 => '',
      ),
    3 => 
    array (
      0 => 
      array (
        'name' => 'phone_work',
        'label' => 'LBL_OFFICE_PHONE',
        ),
      1 => 
      array (
        'name' => 'phone_mobile',
        'label' => 'LBL_MOBILE_PHONE',
        ),
      ),
    4 => 
    array (
      0 => 
      array (
        'name' => 'phone_fax',
        'label' => 'LBL_FAX_PHONE',
        ),
      1 => 
      array (
        'name' => 'department',
        'label' => 'LBL_DEPARTMENT',
        ),
      ),
    5 => 
    array (
      0 => 
      array (
        'name' => 'employee_number_c',
        'label' => 'LBL_EMPLOYEE_NUMBER',
        ),
      1 => '',
      ),
    6 => 
    array (
      0 => 
      array (
        'name' => 'id_type_c',
        'studio' => 'visible',
        'label' => 'LBL_ID_TYPE',
        ),
      1 => 
      array (
        'name' => 'id_number_c',
        'label' => 'LBL_ID_NUMBER',
        ),
      ),
    7 => 
    array (
      0 => 
      array (
        'name' => 'account_name',
        'label' => 'LBL_ACCOUNT_NAME',
        ),
      1 => 
      array (
        'name' => 'primary_contact_c',
        'label' => 'LBL_PRIMARY_CONTACT',
        ),
      ),
    8 => 
    array (
      0 => 
      array (
        'name' => 'email1',
        'studio' => 'false',
        'label' => 'LBL_EMAIL_ADDRESS',
        ),
      1 => '',
      ),
    9 => 
    array (
      0 => 
      array (
        'name' => 'primary_address_street',
        'label' => 'LBL_PRIMARY_ADDRESS',
        'type' => 'address',
        'displayParams' => 
        array (
          'key' => 'primary',
          ),
        ),
      1 => 
      array (
        'name' => 'alt_address_street',
        'label' => 'LBL_ALTERNATE_ADDRESS',
        'type' => 'address',
        'displayParams' => 
        array (
          'key' => 'alt',
          ),
        ),
      ),
    ),
  'lbl_editview_panel2' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'name' => 'linked_user_c',
        'studio' => 'visible',
        'label' => 'LBL_LINKED_USER',
        ),
      1 => '',
      ),
    ),
  'LBL_PANEL_ADVANCED' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'name' => 'description',
        'comment' => 'Full text of the note',
        'label' => 'LBL_DESCRIPTION',
        ),
      1 => 
      array (
        'name' => 'report_to_name',
        'label' => 'LBL_REPORTS_TO',
        ),
      ),
    1 => 
    array (
      0 => 
      array (
        'name' => 'attribute1_c',
        'label' => 'LBL_ATTRIBUTE1',
        ),
      1 => 
      array (
        'name' => 'attribute2_c',
        'label' => 'LBL_ATTRIBUTE2',
        ),
      ),
    2 => 
    array (
      0 => 
      array (
        'name' => 'attribute3_c',
        'label' => 'LBL_ATTRIBUTE3',
        ),
      1 => 
      array (
        'name' => 'attribute4_c',
        'label' => 'LBL_ATTRIBUTE4',
        ),
      ),
    3 => 
    array (
      0 => 
      array (
        'name' => 'attribute5_c',
        'label' => 'LBL_ATTRIBUTE5',
        ),
      1 => 
      array (
        'name' => 'attribute6_c',
        'label' => 'LBL_ATTRIBUTE6',
        ),
      ),
    4 => 
    array (
      0 => 
      array (
        'name' => 'attribute7_c',
        'label' => 'LBL_ATTRIBUTE7',
        ),
      1 => 
      array (
        'name' => 'attribute8_c',
        'label' => 'LBL_ATTRIBUTE8',
        ),
      ),
    5 => 
    array (
      0 => 
      array (
        'name' => 'birthdate',
        'comment' => 'The birthdate of the contact',
        'label' => 'LBL_BIRTHDATE',
        ),
      1 => 
      array (
        'name' => 'attribute9_c',
        'label' => 'LBL_ATTRIBUTE9',
        ),
      ),
    6 => 
    array (
      0 => 
      array (
        'name' => 'lead_source',
        'comment' => 'How did the contact come about',
        'label' => 'LBL_LEAD_SOURCE',
        ),
      1 => 
      array (
        'name' => 'campaign_name',
        'label' => 'LBL_CAMPAIGN',
        ),
      ),
    ),
/*  'LBL_PANEL_ASSIGNMENT' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'name' => 'date_entered',
        'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
        'label' => 'LBL_DATE_ENTERED',
        ),
      1 => 
      array (
        'name' => 'date_modified',
        'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
        'label' => 'LBL_DATE_MODIFIED',
        ),
      ),
    1 => 
    array (
      0 => 
      array (
        'name' => 'data_source_code_c',
        'label' => 'LBL_DATA_SOURCE_CODE',
        ),
      1 => 
      array (
        'name' => 'data_source_id_c',
        'label' => 'LBL_DATA_SOURCE_ID',
        ),
      ),
    ),*/
/*  'lbl_detailview_panel_org' => 
  array (
    0 => 
    array (
      0 => '',
      1 => '',
      ),
    ),*/

/*  'lbl_detailview_panel_history' => 
  array (
    0 => 
    array (
      0 => '',
      1 => '',
      ),
    ),*/
  'lbl_detailview_panel_doc' => 
  array (
    0 => 
    array (
      0 => '',
      1 => '',
      ),
    ),
  'lbl_detailview_panel_business' => 
  array (
    0 => 
    array (
      0 => '',
      1 => '',
      ),
    ),
  /*'lbl_detailview_panel_assets' => 
  array (
    0 => 
    array (
      0 => '',
      1 => '',
      ),
    ),*/


//
  ),
),
);
?>
