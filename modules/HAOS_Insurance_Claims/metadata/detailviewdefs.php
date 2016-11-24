<?php
$module_name = 'HAOS_Insurance_Claims';
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
          'file' => 'modules/HAOS_Insurance_Claims/js/HAOS_Insurance_Claims.js',
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
        6 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY_ID',
          ),
          1 => 
          array (
            'name' => 'claim_total_amount',
            'label' => 'LBL_CLAIM_TOTAL_AMOUNT',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'gap_amount',
            'label' => 'LBL_GAP_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'act_claim_total_amt',
            'label' => 'LBL_ACT_CLAIM_TOTAL_AMT',
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
    ),
  ),
);
?>
