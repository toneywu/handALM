<?php
$module_name = 'AOS_Contracts';
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
      'syncDetailEditViews' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
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
      'default' => 
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
          1 => '',
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
            'name' => 'type_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
       'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_type'
        )
          ),
          1 => 
          array (
            'name' => 'business_type_c',
            'studio' => 'visible',
            'label' => 'LBL_BUSINESS_TYPE',
       'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_business_type'
        )
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'media_type_c',
            'studio' => 'visible',
            'label' => 'LBL_MEDIA_TYPE',
       'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_media_type'
        )            
          ),
          1 => 
          array (
            'name' => 'revision_c',
            'studio' => 'visible',
            'label' => 'LBL_REVISION',
       'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=contract_revision'
        )            
          ),
        ),
        9 => 
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
          0 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'total_amt',
            'label' => 'LBL_TOTAL_AMT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'discount_amount',
            'label' => 'LBL_DISCOUNT_AMOUNT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'subtotal_amount',
            'label' => 'LBL_SUBTOTAL_AMOUNT',
          ),
        ),
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'shipping_tax_amt',
            'label' => 'LBL_SHIPPING_TAX_AMT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'tax_amount',
            'label' => 'LBL_TAX_AMOUNT',
          ),
        ),
        9 => 
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
