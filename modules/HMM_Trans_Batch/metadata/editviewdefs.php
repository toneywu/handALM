<?php
$module_name = 'HMM_Trans_Batch';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        1 => 
        array (
          'file' => 'modules/HMM_Trans_Batch/js/HMM_Trans_Batch_editview.js',
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
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&basic_type_advanced=INV',
              'field_to_name_array' => 
              array (
                'name' => 'event_type',
                'id' => 'hat_event_type_id',
                'basic_type' => 'trans_basic_type',
              ),
              'call_back_function' => 'setEventTypePopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'trans_date',
            'label' => 'LBL_TRANS_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ham_wo',
            'studio' => 'visible',
            'label' => 'LBL_WO',
          ),
          1 => 
          array (
            'name' => 'ham_woop',
            'studio' => 'visible',
            'label' => 'LBL_WOOP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hmm_mo_request',
            'studio' => 'visible',
            'label' => 'LBL_HMM_MO_REQUESTS',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 'description',
          1 => '',
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
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 'trans_basic_type_lov',
          1 => 'trans_basic_type',
        ),
        1 => 
        array (
          0 => 'secondary_unit_defaulting_lov',
          1 => 'locator_control_lov',
        ),
        2 => 
        array (
          0 => 'tracking_uom_lov',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
