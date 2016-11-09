<?php
$module_name = 'HAT_EventManeger';
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
            'customCode' => '<input type="submit" class="button" onClick="this.form.action.value=\'converToRevenue\';" value="{$MOD.LBL_CONVERT_TO_REVENUE}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_CONVERT_TO_REVENUE}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'convert_to_revenue_button',
                'title' => '{$MOD.LBL_CONVERT_TO_REVENUE}',
                'onclick' => 'this.form.action.value=\'converToRevenue\';',
                'name' => 'Convert to Revenue',
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
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
          ),
        'LBL_DETAILVIEW_PANEL1' => 
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
            'name' => 'event_number',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_NUMBER',
            ),
          ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_object',
            'label' => 'LBL_EVENT_OBJECT',
            ),
          1 => 
          array (
            'name' => 'event_subtype',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_SUBTYPE',
            ),
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'event_resp_party',
            'label' => 'LBL_EVENT_RESP_PARTY',
            ),
          1 => 'name',
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_name',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_NAME',
            ),
          1 => 
          array (
            'name' => 'asset_number',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_NUMBER',
            ),
          ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'person_name',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_NAME',
            ),
          1 => 
          array (
            'name' => 'person_number',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_NUMBER',
            ),
          ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'event_date',
            'label' => 'LBL_EVENT_DATE',
            ),
          1 => 
          array (
            'name' => 'event_location',
            'label' => 'LBL_EVENT_LOCATION',
            ),
          ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'fine',
            'label' => 'LBL_FINE',
            ),
          1 => 
          array (
            'name' => 'treatment_status',
            'studio' => 'visible',
            'label' => 'LBL_TREATMENT_STATUS',
            ),
          ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'treatment_process',
            'studio' => 'visible',
            'label' => 'LBL_TREATMENT_PROCESS',
            ),
          1 => 'description',
          ),
        9 => 
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
        10 => 
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
        11 => 
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
        12 => 
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
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
         0 => 
         array (
          'name' => 'revenue_quote_number',
          'studio' => 'visible',
          'label' => 'LBL_REVENUE_QUOTE_NUMBER',
          ),
         1 => 
         array (
          'name' => 'clear_status',
          'studio' => 'visible',
          'label' => 'LBL_CLEAR_STATUS',
          ),
         ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'cleared_status',
            'studio' => 'visible',
            'label' => 'LBL_CLEARED_STATUS',
            ),
          1 => 
          array (
            'name' => 'invoice_number',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE_NUMBER',
            ),
          ),
        ),
      ),
),
);
?>
