<?php
$module_name = 'HAOS_Insurance_Claims_Lines';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
      'tabDefs' => 
      array (
        'DEFAULT' => 
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
            'name' => 'relate_insurance_number',
            'studio' => 'visible',
            'label' => 'LBL_RELATE_INSURANCE_NUMBER',
            'displayParams' => 
            array (
              'name' => 'relate_insurance_number',
              'id' => 'haos_insurances_id_c',
              'insurance_type' => 'insurance_type',
            ),
          ),
          1 => 
          array (
            'name' => 'insurance_type',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_TYPE',
            'customCode' => '<input name="insurance_type" id="insurance_type" size="30" maxlength="25" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'claim_amount',
            'label' => 'LBL_CLAIM_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'other_side_amount',
            'label' => 'LBL_OTHER_SIDE_AMOUNT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gap_amount',
            'label' => 'LBL_GAP_AMOUNT',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'actual_amount',
            'label' => 'LBL_ACTUAL_AMOUNT',
            'customCode' => '<input name="actual_amount" id="actual_amount" size="30" maxlength="26" value="" title="" tabindex="0" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'other_side_act_amt',
            'label' => 'LBL_OTHER_SIDE_ACT_AMT',
            'customCode' => '<input name="other_side_act_amt" id="other_side_act_amt" size="30" maxlength="26" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'document_ready_flag',
            'label' => 'LBL_DOCUMENT_READY_FLAG',
          ),
          1 => 
          array (
            'name' => 'document_deliver_date',
            'label' => 'LBL_DOCUMENT_DELIVER_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'premium_payment_date',
            'label' => 'LBL_PREMIUM_PAYMENT_DATE',
          ),
          1 => 
          array (
            'name' => 'gap_payment_date',
            'label' => 'LBL_GAP_PAYMENT_DATE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'accident_experience',
            'studio' => 'visible',
            'label' => 'LBL_ACCIDENT_EXPERIENCE',
          ),
          1 => 
          array (
            'name' => 'additional_comments',
            'studio' => 'visible',
            'label' => 'LBL_ADDITIONAL_COMMENTS',
          ),
        ),
      ),
    ),
  ),
);
?>
