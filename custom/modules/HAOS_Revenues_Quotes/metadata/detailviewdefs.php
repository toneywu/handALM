<?php
$module_name = 'HAOS_Revenues_Quotes';
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
          'file' => 'modules/HAOS_Revenues_Quotes/js/createInvoice.js',
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
          4=>
          array (
            'customCode' => '<input type="button" class="button" onClick="createInvoice();" value="结算">',
            // 'customCode' => '<input type="button" class="button" onClick="showPopup(\'pdf\');" value="{$MOD.LBL_PRINT_AS_PDF}">',
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
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
          ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
          ),
        'LBL_LINE_ITEMS_PANEL1' => 
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
            ),
          1 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source_code',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_CODE',
            ),
          1 => 
          array (
            'name' => 'source_reference',
            'label' => 'LBL_SOURCE_REFERENCE',
            ),
          ),
        ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'expense_group',
            'studio' => 'visible',
            'label' => 'LBL_EXPENSE_GROUP',
            ),
          1 => 
          array (
            'name' => 'expense_type',
            'studio' => 'visible',
            'label' => 'LBL_EXPENSE_TYPE',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'revenue_quote_number',
            'label' => 'LBL_REVENUE_QUOTE_NUMBER',
            ),
          1 => 
          array (
            'name' => 'revenue_quote_name',
            'label' => 'LBL_REVENUE_QUOTE_NAME',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_date',
            'label' => 'LBL_EVENT_DATE',
            ),
          1 => 
          array (
            'name' => 'period_name',
            'label' => 'LBL_PERIOD_NAME',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'due_date',
            'label' => 'LBL_DUE_DATE',
            ),
          1 => 
          array (
            'name' => 'clear_status',
            'studio' => 'visible',
            'label' => 'LBL_CLEAR_STATUS',
            ),
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'cleared_status',
            'label' => 'LBL_CLEARED_STATUS',
            ),
          1 => 
          array (
            'name' => 'deposit_flag',
            'label' => 'LBL_DEPOSIT_FLAG',
            ),
          ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'prepay_flag',
            'label' => 'LBL_PREPAY_FLAG',
            ),
          1 => 
          array (
            'name' => 'bill_id',
            'label' => 'LBL_BILL_ID',
            ),
          ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'invoice_number',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_NUMBER',
            ),
          1 => 
          array (
            'name' => 'invoice_line_number',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_LINE_NUMBER',
            ),
          ),
        ),
      'lbl_line_items_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'label' => 'LBL_LINE_ITEMS',
            ),
          ),
        ),
      'lbl_editview_panel1' => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'attribute9',
            'label' => 'LBL_ATTRIBUTE9',
            ),
          1 => 
          array (
            'name' => 'attribute10',
            'label' => 'LBL_ATTRIBUTE10',
            ),
          ),
        ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_NAME',
            ),
          1 => 
          array (
            'name' => 'contract_number',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_NUMBER',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contract_name',
            'label' => 'LBL_CONTRACT_NAME',
            ),
          1 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
            ),
          ),
        ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'source_number',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_NUMBER',
            ),
          1 => 
          array (
            'name' => 'source_name',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_NAME',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source_type',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_TYPE',
            ),
          1 => 
          array (
            'name' => 'source_class',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_CLASS',
            ),
          ),
        ),
      ),
),
);
?>
