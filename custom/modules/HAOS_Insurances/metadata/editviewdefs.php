<?php
$module_name = 'HAOS_Insurances';
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
          'file' => 'custom/modules/HAOS_Insurances/js/HAOS_Insurances_editview.js',
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
            'name' => 'insurance_type',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=insurance_type',
              'field_to_name_array' => 
              array (
                'name' => 'insurance_type',
                'id' => 'haa_codes_id_c',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setInsuranceTypePopupReturn',
            ),
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'insurance_subtype',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_SUBTYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=insurance_type&parent_type_value_advanced="+this.form.{$fields.insurance_type.name}.value+"',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'start_date',
            'label' => 'LBL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'end_date',
            'label' => 'LBL_END_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'organization',
            'label' => 'LBL_ORGANIZATION',
          ),
          1 => 
          array (
            'name' => 'insured_person',
            'label' => 'LBL_INSURED_PERSON',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'first_beneficiary',
            'studio' => 'visible',
            'label' => 'LBL_FIRST_BENEFICIARY',
            'displayParams' => 
            array (
              'initial_filter' => '&org_type_c_advanced=external',
            ),
          ),
          1 => 'description',
        ),
      ),
      'lbl_editview_panel3' => 
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
      'lbl_editview_panel1' => 
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
    ),
  ),
);
?>
