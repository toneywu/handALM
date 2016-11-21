<?php
$viewdefs ['Users'] = 
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
      'form' => 
      array (
        'headerTpl' => 'modules/Users/tpls/EditViewHeader.tpl',
        'footerTpl' => 'modules/Users/tpls/EditViewFooter.tpl',
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/Users/js/UsersEditView.js',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_USER_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EMPLOYEE_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'LBL_USER_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'user_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'chinese_name_c',
            'label' => 'LBL_CHINESE_NAME_C',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'primary_email_c',
            'label' => 'LBL_PRIMARY_EMAIL_C',
          ),
          1 => 
          array (
            'name' => 'status',
            'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$STATUS_READONLY}{/if}',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'first_name_c',
            'label' => 'LBL_FIRST_NAME_C',
          ),
          1 => 
          array (
            'name' => 'last_name_c',
            'label' => 'LBL_LAST_NAME_C',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'employee_number_c',
            'label' => 'LBL_EMPLOYEE_NUMBER_C',
          ),
          1 => 
          array (
            'name' => 'salutation_c',
            'studio' => 'visible',
            'label' => 'LBL_SALUTATION_C',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'UserType',
            'customCode' => '{if $IS_ADMIN}{$USER_TYPE_DROPDOWN}{else}{$USER_TYPE_READONLY}{/if}',
          ),
          1 => 
          array (
            'name' => 'asset_access_profile_c',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_ACCESS_PROFILE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'photo',
            'label' => 'LBL_PHOTO',
          ),
          1 => 'last_name',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sync_contact_c',
            'label' => 'LBL_SYNC_CONTACT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_organization_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_ORGANIZATION',
          ),
          1 => 
          array (
            'name' => 'linked_contact_c',
            'studio' => 'visible',
            'label' => 'LBL_LINKED_CONTACT',
            'displayParams' => 
            array (
              'initial_filter' => '&account_name_advanced="+encodeURIComponent(document.getElementById("contact_organization_c").value)+"',
            ),
          ),
        ),
      ),
      'LBL_EMPLOYEE_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'employee_status',
            'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$EMPLOYEE_STATUS_READONLY}{/if}',
          ),
          1 => 'show_on_employees',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'title',
            'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$TITLE_READONLY}{/if}',
          ),
          1 => 'phone_work',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'department',
            'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$DEPT_READONLY}{/if}',
          ),
          1 => 'phone_mobile',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'reports_to_name',
            'customCode' => '{if $IS_ADMIN}@@FIELD@@{else}{$REPORTS_TO_READONLY}{/if}',
          ),
          1 => 'phone_other',
        ),
        4 => 
        array (
          0 => 'phone_fax',
        ),
        5 => 
        array (
          0 => 'phone_home',
        ),
        6 => 
        array (
          0 => 'messenger_type',
          1 => 'messenger_id',
        ),
        7 => 
        array (
          0 => 'address_street',
          1 => 'address_city',
        ),
        8 => 
        array (
          0 => 'address_state',
          1 => 'address_postalcode',
        ),
        9 => 
        array (
          0 => 'address_country',
        ),
        10 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
