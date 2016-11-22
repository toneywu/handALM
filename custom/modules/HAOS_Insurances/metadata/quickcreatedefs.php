<?php
$module_name = 'HAOS_Insurances';
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
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'insurance_subtype',
            'studio' => 'visible',
            'label' => 'LBL_INSURANCE_SUBTYPE',
          ),
        ),
        2 => 
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
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'first_beneficiary',
            'studio' => 'visible',
            'label' => 'LBL_FIRST_BENEFICIARY',
          ),
          1 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
