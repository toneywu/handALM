<?php
$module_name = 'AOS_Contracts';
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
          'file' => 'custom/modules/AOS_Contracts/js/AOS_Contracts_editview.js',
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
      'syncDetailEditViews' => false,
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
        'LBL_LINE_ITEMS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'DEFAULT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'framework_c',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORK_C',
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_type',
              'field_to_name_array' => 
              array (
                'name' => 'type_c',
                'id' => 'haa_codes_id_c',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setContractTypePopupReturn',
            ),
          ),
        ),
      ),
      'LBL_EDITVIEW_PANEL1' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contract_number_c',
            'label' => 'LBL_CONTRACT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'contract_subtype_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_SUBTYPE_C',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_type&parent_type_value_advanced="+this.form.{$fields.type_c.name}.value+"',
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'total_contract_value',
            'label' => 'LBL_TOTAL_CONTRACT_VALUE',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'contract_account',
            'label' => 'LBL_CONTRACT_ACCOUNT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
          1 => 
          array (
            'name' => 'contact',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'renewal_reminder_date',
            'label' => 'LBL_RENEWAL_REMINDER_DATE',
            'type' => 'datetimecombo',
          ),
          1 => 
          array (
            'name' => 'opportunity',
            'label' => 'LBL_OPPORTUNITY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'company_signed_date',
            'label' => 'LBL_COMPANY_SIGNED_DATE',
          ),
          1 => 
          array (
            'name' => 'customer_signed_date',
            'label' => 'LBL_CUSTOMER_SIGNED_DATE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'business_type_c',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_business_type',
            ),
          ),
          1 => 
          array (
            'name' => 'media_type_c',
            'studio' => 'visible',
            'label' => 'LBL_MEDIA_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_media_type',
            ),
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'revision_c',
            'studio' => 'visible',
            'label' => 'LBL_REVISION',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_revision',
            ),
          ),
          1 => 
          array (
            'name' => 'pre_contract_number_c',
            'studio' => 'visible',
            'label' => 'LBL_PRE_CONTRACT_NUMBER_C',
            'displayParams' => 
            array (
              'initial_filter' => '&type_c_advanced="+this.form.{$fields.type_c.name}.value+"',
              'field_to_name_array' => 
              array (
                'id' => 'aos_contracts_id_c',
                'name' => 'pre_contract_number_c',
                'contract_number_c' => 'contract_number_c',
                'contract_revision_c' => 'contract_revision_c',
              ),
              'call_back_function' => 'setPreContractPopupReturn',
            ),
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'contract_templates_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_TEMPLATES_C',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'id' => 'haos_contract_templates_id_c',
                'name' => 'contract_templates_c',
              ),
              'call_back_function' => 'setContractTempPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'contract_revision_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_REVISION',
            'customCode' => '<input name="contract_revision_c" readonly="readonly" id="contract_revision_c" value="{$contract_revision}"  type="text">',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'number_of_periods_c',
            'studio' => 'visible',
            'label' => 'LBL_NUMBER_OF_PERIODS',
          ),
          1 => 
          array (
            'name' => 'attribute1_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE1_C',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'attribute2_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE2_C',
          ),
          1 => 
          array (
            'name' => 'attribute3_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE3_C',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'attribute4_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE4_C',
          ),
          1 => 
          array (
            'name' => 'attribute5_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE5_C',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'attribute6_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE6_C',
          ),
          1 => 'description',
        ),
      ),
      'lbl_line_items' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'label' => 'LBL_LINE_ITEMS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'total_amt',
            'label' => 'LBL_TOTAL_AMT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'discount_amount',
            'label' => 'LBL_DISCOUNT_AMOUNT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'subtotal_amount',
            'label' => 'LBL_SUBTOTAL_AMOUNT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'shipping_amount',
            'label' => 'LBL_SHIPPING_AMOUNT',
            'displayParams' => 
            array (
              'field' => 
              array (
                'onblur' => 'calculateTotal(\'lineItems\');',
              ),
            ),
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'shipping_tax_amt',
            'label' => 'LBL_SHIPPING_TAX_AMT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'tax_amount',
            'label' => 'LBL_TAX_AMOUNT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'total_amount',
            'label' => 'LBL_GRAND_TOTAL',
          ),
        ),
      ),
    ),
  ),
);
?>
