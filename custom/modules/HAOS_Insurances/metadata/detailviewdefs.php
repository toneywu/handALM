<?php
$module_name = 'HAOS_Insurances';
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
          'file' => 'custom/modules/HAOS_Insurances/js/HAOS_Insurances_detailview.js',
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
        'LBL_DETAILVIEW_PANEL2' => 
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
          ),
          1 => 
          array (
            'name' => 'insurance_type',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_TYPE',
          ),
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'insurance_subtype',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_SUBTYPE',
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
          ),
          1 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
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
