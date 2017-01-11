<?php
$module_name = 'HAT_Incidents';
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
          'file' => 'modules/HAT_Incidents/js/HAT_Incidents_editview.js',
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
          'customCode' => '{$FRAMEWORK_C}',
          ),
        1 => 
        array (
          'name' => 'event_type',
          'label' => 'LBL_EVENT_TYPE',
          'displayParams' => 
          array (
            'initial_filter' => '&basic_type_advanced=EVENT_MANAGER',
            'field_to_name_array' => 
            array (
              'name' => 'event_type',
              'id' => 'hat_eventtype_id_c',
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
          'name' => 'event_number',
          'studio' => 'visible',
          'label' => 'LBL_EVENT_NUMBER',
          'customCode' => '{$fields.event_number.value}',
          ),
        ),
      ),
    'lbl_editview_panel3' => 
    array (
      0 => 
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
      1 => 
      array (
        0 => 
        array (
          'name' => 'asset_number',
          'studio' => 'visible',
          'label' => 'LBL_ASSET_NUMBER',
          'displayParams' => 
          array (
            'field_to_name_array' => 
            array (
              'asset_desc' => 'asset_name',
              'id' => 'hat_assets_id_c',
              'name' => 'asset_number',
              'using_person' => 'person_name',
              'using_person_id' => 'contact_id_c'
              ),
            'call_back_function' => 'setHatAssetsReturn',
            ),
          ),
        1 => 
        array (
          'name' => 'asset_name',
          'studio' => 'visible',
          'label' => 'LBL_ASSET_NAME',
          'customCode' => '<input type="text" readonly="readonly" name="asset_name" id="asset_name" value="{$fields.asset_name.value}">',
          ),
        ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'person_number',
          'studio' => 'visible',
          'label' => 'LBL_PERSON_NUMBER',
          'displayParams' => 
          array (
            'field_to_name_array' => 
            array (
              //'chinese_name_c' => 'person_name',
              'id' => 'contact_id_c',
              'last_name' => 'person_number',
              ),
            ),
          ),
        1 => ''
/*        array (
          'name' => 'person_name',
          'studio' => 'visible',
          'label' => 'LBL_PERSON_NAME',
          'customCode' => '<input type="text" readonly="readonly" name="person_name" id="person_name" value="{$fields.person_name.value}">',
          ),*/
        ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'event_object',
          'label' => 'LBL_EVENT_OBJECT',
          ),
        1 => 
        array (
          'name' => 'event_resp_party',
          'label' => 'LBL_EVENT_RESP_PARTY',
          ),
        ),

      4 => 
      array (
        0 => 'name',
        1 => 
        array (
          'name' => 'fine',
          'label' => 'LBL_FINE',
          ),
        ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'event_subtype',
          'studio' => 'visible',
          'label' => 'LBL_EVENT_SUBTYPE',
          ),
        1 => 
        array (
          'name' => 'treatment_status',
          'studio' => 'visible',
          'label' => 'LBL_TREATMENT_STATUS',
          ),
        ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'treatment_process',
          'studio' => 'visible',
          'label' => 'LBL_TREATMENT_PROCESS',
          ),
        1 => 'description',
        ),
      7 => 
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
      8 => 
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
      9 => 
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
      10 => 
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
    'lbl_editview_panel1' => 
    array (
      0 => 
      array (
        1 => 
        array (
          'name' => 'clear_status',
          'studio' => 'visible',
          'label' => 'LBL_CLEAR_STATUS',
          'customCode' => '<input type="text" readonly="readonly" name="clear_status" id="clear_status" value="{$fields.clear_status.value}">',
          ),
        ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'cleared_status',
          'studio' => 'visible',
          'label' => 'LBL_CLEARED_STATUS',
          'customCode' => '<input type="text" readonly="readonly" name="cleared_status" id="cleared_status" value="{$fields.cleared_status.value}">',
          ),
        1 => 
        array (
          'name' => 'invoice_number',
          'studio' => 'visible',
          'label' => 'LBL_INVOICE_NUMBER',
          'customCode' => '<input type="text" readonly="readonly" name="invoice_number" id="invoice_number" value="{$fields.invoice_number.value}">',
          ),
        ),
      ),
    ),
),
);
?>
