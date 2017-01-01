<?php
$module_name = 'AOS_Contracts';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/AOS_Contracts/js/AOS_Contracts_detailview.js',
        ),
      ),
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
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'pdf\');" value="{$MOD.LBL_PRINT_AS_PDF}">',
          ),
          5 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'emailpdf\');" value="{$MOD.LBL_EMAIL_PDF}">',
          ),
          6 => 
          array (
            'customCode' => '<input type="submit" class="button" onClick="this.form.action.value=\'createToRevenues\';" value="{$MOD.LBL_CREATE_REVENUE}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_CREATE_REVENUE}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'create_to_revenue_button',
                'title' => '{$MOD.LBL_CREATE_REVENUE}',
                'onclick' => 'this.form.action.value=\'createToRevenues\';',
                'name' => 'Create to Revenue',
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
      'syncDetailEditViews' => true,
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
          ),
          1 => 
          array (
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
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
          ),
          1 => 
          array (
            'name' => 'media_type_c',
            'studio' => 'visible',
            'label' => 'LBL_MEDIA_TYPE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'revision_c',
            'studio' => 'visible',
            'label' => 'LBL_REVISION',
          ),
          1 => 
          array (
            'name' => 'pre_contract_number_c',
            'studio' => 'visible',
            'label' => 'LBL_PRE_CONTRACT_NUMBER_C',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'contract_revision_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_REVISION',
          ),
          1 => 
          array (
            'name' => 'number_of_periods_c',
            'studio' => 'visible',
            'label' => 'LBL_NUMBER_OF_PERIODS',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'attribute1_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE1_C',
          ),
          1 => 
          array (
            'name' => 'attribute2_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE2_C',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'attribute3_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE3_C',
          ),
          1 => 
          array (
            'name' => 'attribute4_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE4_C',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'attribute5_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE5_C',
          ),
          1 => 
          array (
            'name' => 'attribute6_c',
            'studio' => 'visible',
            'label' => 'LBL_ATTRIBUTE6_C',
          ),
        ),
        13 => 
        array (
          0 => 'description',
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
