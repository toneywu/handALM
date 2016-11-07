<?php
$module_name = 'HAOS_Revenues_Quotes';
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
          'file' => 'modules/HAOS_Revenues_Quotes/js/HAOS_Revenues_Quotes_editview.js',
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode' => '{$FRAMEWORK_C}',
            ),
          1 => 
          array (
            'name' => 'event_type',
            'label' => 'LBL_EVENT_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&basic_type_advanced=REVENUE',
              'field_to_name_array' => 
              array (
                'name' => 'event_type',
                'id' => 'parent_eventtype_id',
                'haa_ff_id' => 'haa_ff_id',
                ),
              'call_back_function' => 'setEventTypeReturn',
              ),
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source_code',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_CODE',
            'customCode' => '<select name="{$fields.source_code.name}" onchange="resetParentInfo();" id="{$fields.source_code.name}" title="" tabindex="s">{if isset($fields.source_code.value) && $fields.source_code.value != ""}{html_options options=$fields.source_code.options selected=$fields.source_code.value}{else}{html_options options=$fields.source_code.options selected="Manual"}{/if}</select><input name="source_id"  id="source_id"  type="hidden" value="{$fields.source_id.value}">',
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
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=revenue_expense_group',
              ),
            ),

          1 => 
          array (
            'name' => 'expense_type',
            'studio' => 'visible',
            'label' => 'LBL_EXPENSE_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=revenue_expense_group',
              ),
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'revenue_quote_number',
            'label' => 'LBL_REVENUE_QUOTE_NUMBER',
            'customCode' => '{$fields.revenue_quote_number.value}',
            ),
          1 => 'name',
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
            'name' => 'due_date',
            'label' => 'LBL_DUE_DATE',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'clear_status',
            'studio' => 'visible',
            'label' => 'LBL_CLEAR_STATUS',
            ),
          1 => 
          array (
            'name' => 'cleared_status',
            'studio' => 'visible',
            'label' => 'LBL_CLEARED_STATUS',
            'customCode' => '{$fields.cleared_status.value}',
            ),
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'deposit_flag',
            'label' => 'LBL_DEPOSIT_FLAG',
            ),
          1 => 
          array (
            'name' => 'prepay_flag',
            'label' => 'LBL_PREPAY_FLAG',
            ),
          ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'bill_id',
            'label' => 'LBL_BILL_ID',
            ),
          1 => 
          array (
            'name' => 'invoice_number',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_NUMBER',
            ),
          ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'invoice_line_number',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_LINE_NUMBER',
            ),
          1 => '',
          ),
        ),
      'lbl_line_items_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
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
          0 =>   array (
            'name' => 'account_name',
            'studio' => 'visible',
            'label' => 'LBL_ACCOUNT_NAME',
            ),
          1 => 
          array (
            'name' => 'contract_number',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_NUMBER',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'id' => 'contact_id_c',
                'chinese_name_c' => 'contract_name',
                'employee_number_c' => 'contract_number',
                ),
              ),
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contract_name',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT_NAME',
            'customCode' => '<input type="text" readonly="readonly" name="contract_name" id="contract_name" value="{$fields.contract_name.value}">',
            ),
          1 => '',
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
            'customCode' => '<input value="{$fields.source_number.value}" class="sqsEnabled" autocomplete="off" type="text" name="source_number" id="source_number"><button type="button" tabindex="116" class="button" name="btn1" onclick="openSourcePopup();"><img src="themes/default/images/id-ff-select.png"></button>',
            ),
          1 => 
          array (
            'name' => 'source_name',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_NAME',
            'customCode' => '<input type="text" readonly="readonly" name="source_name" id="source_name" value="{$fields.source_name.value}">',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'source_type',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_TYPE',
            'customCode' => '<input type="text" readonly="readonly" name="source_type" id="source_type" value="{$fields.source_type.value}">',
            ),
          1 => 
          array (
            'name' => 'source_class',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_CLASS',
            'customCode' => '<input type="text" readonly="readonly" name="source_class" id="source_class" value="{$fields.source_class.value}">',
            ),
          ),
        ),
      ),
),
);
?>
