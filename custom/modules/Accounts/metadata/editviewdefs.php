<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        1 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
        2 => 
        array (
          'file' => 'custom/modules/Accounts/js/AccountsEditView.js',
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
        'LBL_EDITVIEW_PANEL5' => 
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          'newTab' => false,
          'panelDefault' => 'collapsed',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
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
            'label' => 'LBL_FRAME',
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'business_type_c',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=accounts_business_type',
              'field_to_name_array' => 
              array (
                'name' => 'business_type_c',
                'id' => 'haa_codes_id1_c',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setBusinessTypePopupReturn',
            ),
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'full_name_c',
            'label' => 'LBL_FULL_NAME',
          ),
          1 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'organization_number_c',
            'label' => 'LBL_ORGANIZATION_NUMBER',
          ),
          1 => 
          array (
            'name' => 'org_type_c',
            'studio' => 'visible',
            'label' => 'LBL_ORG_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'organization_level_c',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION_LEVEL',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=accounts_level',
            ),
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'is_cooperation_group_c',
            'label' => 'LBL_IS_COOPERATION_GROUP',
          ),
          1 => 'parent_name',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'is_le_c',
            'label' => 'LBL_IS_LE',
          ),
          1 => 
          array (
            'name' => 'is_asset_org_c',
            'label' => 'LBL_IS_ASSET_ORG',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'is_customer_c',
            'label' => 'LBL_IS_CUSTOMER',
          ),
          1 => 
          array (
            'name' => 'is_supplier_c',
            'label' => 'LBL_IS_SUPPLIER',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'responsible_person_c',
            'label' => 'LBL_RESPONSIBLE_PERSON',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'responsible_person_id_c',
            'label' => 'LBL_RESPONSIBLE_PERSON_ID',
          ),
          1 => 
          array (
            'name' => 'responsible_person_note_c',
            'label' => 'LBL_RESPONSIBLE_PERSON_NOTE',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'customer_classs_c',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMER_CLASSS',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=accounts_customer_class',
            ),
          ),
          1 => 
          array (
            'name' => 'credit_hold_c',
            'label' => 'LBL_CREDIT_HOLD',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'sales_org_c',
            'studio' => 'visible',
            'label' => 'LBL_SALES_ORG',
          ),
          1 => 
          array (
            'name' => 'service_org_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_ORG',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sales_responsible_person_c',
            'studio' => 'visible',
            'label' => 'LBL_SALES_RESPONSIBLE_PERSON',
          ),
          1 => 
          array (
            'name' => 'service_responsible_person_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_RESPONSIBLE_PERSON',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sales_note_c',
            'studio' => 'visible',
            'label' => 'LBL_SALES_NOTE',
          ),
          1 => 
          array (
            'name' => 'service_note_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_NOTE',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'industry',
          1 => 
          array (
            'name' => 'sic_code',
            'comment' => 'SIC code of the account',
            'label' => 'LBL_SIC_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'annual_revenue',
          1 => 'employees',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ownership',
            'comment' => '',
            'label' => 'LBL_OWNERSHIP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'registration_id_c',
            'label' => 'LBL_REGISTRATION_ID',
          ),
          1 => 
          array (
            'name' => 'registration_capital_c',
            'label' => 'LBL_REGISTRATION_CAPITAL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'duns_number_c',
            'label' => 'LBL_DUNS_NUMBER',
          ),
          1 => 
          array (
            'name' => 'ticker_symbol',
            'comment' => 'The stock trading (ticker) symbol for the company',
            'label' => 'LBL_TICKER_SYMBOL',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'website',
            'type' => 'link',
            'label' => 'LBL_WEBSITE',
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'label' => 'LBL_PHONE_OFFICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
              'copy' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
            ),
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
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
        1 => 
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
        2 => 
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
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'attribute9_c',
            'label' => 'LBL_ATTRIBUTE9',
          ),
        ),
      ),
    ),
  ),
);
?>
