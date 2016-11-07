<?php
$module_name = 'HAT_EventManeger';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
          ),
          1 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_number',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_NUMBER',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'person_number',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_NUMBER',
          ),
          1 => '',
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
            'name' => 'event_resp_party',
            'label' => 'LBL_EVENT_RESP_PARTY',
          ),
        ),
        3 => 
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
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => '',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hat_eventmaneger_haos_revenues_quotes_name',
          ),
        ),
      ),
    ),
  ),
);
?>
