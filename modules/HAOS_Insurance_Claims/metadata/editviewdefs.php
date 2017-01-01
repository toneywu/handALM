<?php
$module_name = 'HAOS_Insurance_Claims';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes'=>
      array(
        0=>
        array(
          'file'=>'modules/HAOS_Insurance_Claims/js/HAOS_Insurance_Claims.js',
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
            'customCode'=>'{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'claim_type',
            'studio' => 'visible',
            'label' => 'LBL_CLAIM_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=insurance_claim_type',
              'field_to_name_array' => 
              array (
                'name' => 'claim_type',
                'id' => 'haa_codes_id_c',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setClaimTypePopupReturn',
            ),
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'claim_number',
            'label' => 'LBL_CLAIM_NUMBER',
          ),
          1 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
            'studio' => 'visible',
            'label' => 'LBL_FLEX_RELATE',
          ),
          1 => 
          array (
            'name' => 'claim_treated_status',
            'studio' => 'visible',
            'label' => 'LBL_CLAIM_TREATED_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'relate_event_number',
            'studio' => 'visible',
            'label' => 'LBL_RELATE_EVENT_NUMBER',
            'displayParams' => 
            array (
              'initial_filter' => '&asset_number_advanced="+this.form.{$fields.parent_name.name}.value+"',
              'field_to_name_array' =>
              array (
                'event_number' => 'relate_event_number',
                'id' => 'hat_incidents_id_c',
                'event_date' => 'time',
                'event_location' => 'location',
                'name'=>'comment',
                ),
            ),
          ),
          1 => 
          array(
            'name'=>'time',
            'studio'=>'visible',
            'label'=>'LBL_TIME',
          ),
        ),
        3 => 
        array (
          0 => 
          array(
            'name'=>'location',
            'studio'=>'visible',
            'label'=>'LBL_LOCATION',
          ),
          1 => 
          array(
            'name'=>'comment',
            'studio'=>'visible',
            'label'=>'LBL_COMMENT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'relate_wo_number',
            'studio' => 'visible',
            'label' => 'LBL_RELATE_WO_NUMBER',
            'displayParams' => 
            array (
              'initial_filter' => '&asset_advanced="+this.form.{$fields.parent_name.name}.value+"',
              'field_to_name_array' =>
              array (
                'id' => 'ham_wo_id_c',
                'wo_number'=>'relate_wo_number',
                'name' => 'wo_info',
                ),
            ),
          ),
          1 => 
          array (
            'name' => 'wo_info',
            'studio' => 'visible',
            'label' => 'LBL_WO_INFO',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'repair_cost',
            'studio' => 'visible',
            'label' => 'LBL_REPAIR_COST',
          ),
          1 => 
          array (
            'name' => 'other_repair_cost',
            'studio' => 'visible',
            'label' => 'LBL_OTHER_REPAIR_COST',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
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
      'LBL_EDITVIEW_PANEL3' => 
      array (
        0=>array(
          0=>
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
             'customCode'=>'<span id="line_items_span">',
          ),
        ),
        2=>
        array(
          0=>
          array (
            'name' => 'claim_total_amount',
            'label' => 'LBL_CLAIM_TOTAL_AMOUNT',
          ),
        ),
        3=>
        array(
          0=>
          array (
            'name' => 'gap_amount',
            'label' => 'LBL_GAP_AMOUNT',
          ),
        ),
        4=>
        array(
          0=>
          array (
            'name' => 'act_claim_total_amt',
            'label' => 'LBL_ACT_CLAIM_TOTAL_AMT',
          ),
        ),
      ),
    ),
  ),
);
?>
