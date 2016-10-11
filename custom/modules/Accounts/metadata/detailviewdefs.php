<?php
$viewdefs ['Accounts'] = 
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
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        2 => 
        array (
          'file' => 'custom/modules/Accounts/js/AccountsDetailView.js',
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
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'business_type_c',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'comment' => 'Name of the Company',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'full_name_c',
            'label' => 'LBL_FULL_NAME',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'organization_level_c',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION_LEVEL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'is_cooperation_group_c',
            'label' => 'LBL_IS_COOPERATION_GROUP',
          ),
          1 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_MEMBER_OF',
          ),
        ),
        5 => 
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
        6 => 
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
          0 => 
          array (
            'name' => 'responsible_person_c',
            'label' => 'LBL_RESPONSIBLE_PERSON',
          ),
        ),
        1 => 
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
            'name' => 'sales_responsible_person_c',
            'studio' => 'visible',
            'label' => 'LBL_SALES_RESPONSIBLE_PERSON',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'service_org_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_ORG',
          ),
          1 => 
          array (
            'name' => 'service_responsible_person_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_RESPONSIBLE_PERSON',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'industry',
            'comment' => 'The company belongs in this industry',
            'label' => 'LBL_INDUSTRY',
          ),
          1 => 
          array (
            'name' => 'sic_code',
            'comment' => 'SIC code of the account',
            'label' => 'LBL_SIC_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'annual_revenue',
            'comment' => 'Annual revenue for this company',
            'label' => 'LBL_ANNUAL_REVENUE',
          ),
          1 => 
          array (
            'name' => 'employees',
            'comment' => 'Number of employees, varchar to accomodate for both number (100) or range (50-100)',
            'label' => 'LBL_EMPLOYEES',
          ),
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
            'displayParams' => 
            array (
              'link_target' => '_blank',
            ),
          ),
          1 => 
          array (
            'name' => 'phone_office',
            'comment' => 'The office phone number',
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
            'comment' => 'The fax phone number of this company',
            'label' => 'LBL_FAX',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'billing_address_street',
            'label' => 'LBL_BILLING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
            ),
          ),
          1 => 
          array (
            'name' => 'shipping_address_street',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'attribute5_c',
            'label' => 'LBL_ATTRIBUTE5',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'data_source_code_c',
            'label' => 'LBL_DATA_SOURCE_CODE',
          ),
          1 => 
          array (
            'name' => 'data_source_reference_c',
            'label' => 'LBL_DATA_SOURCE_REFERENCE',
          ),
        ),
      ),
    ),
  ),
);
?>
