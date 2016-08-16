<?php
$module_name = 'HAT_Asset_Trans_Batch';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
/*        0 => 
        array (
          'file' => 'modules/HAT_EventType/js/reset_EvenType_Fields.js',
          ),*/
        1 =>
        array (
          'file' => 'modules/HAT_Asset_Trans_Batch/js/HAT_Asset_Trans_Batch_editview.js',
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
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
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => true,
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
          0 => array (
            'name' => 'domain',
            'label' => 'LBL_DOMAIN',
            ),
          1=>'',
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type_c',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&basic_type_advanced=AT_MOVE',
              'field_to_name_array' => 
              array (
                'name' => 'event_type_c',
                'id' => 'hat_eventtype_id_c',
                'change_target_status' => 'change_target_status',
                'target_asset_status' => 'target_asset_status',
                'change_organization' => 'change_organization',
                'change_oranization_le' => 'change_oranization_le',
                'change_contact' => 'change_contact',
                'change_location' => 'change_location',
                'change_location_desc' => 'change_location_desc',
                'require_approval_workflow' => 'require_approval_workflow',
                'require_confirmation' => 'require_confirmation',
                'change_processing_status' => 'change_processing_status',
                'processing_asset_status' => 'processing_asset_status'
                ),
             'call_back_function' => 'setEventTypePopupReturn',//'setEventTypePopupReturn',
             ),
            ),
          1 => 
          array (
            'name' => 'asset_trans_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_TRANS_STATUS',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'current_organization_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_ORGANIZATION',
            'displayParams' => 
            array (
              'call_back_function' => 'setHeaderOrganizationPopupReturn',
              ),
            ),
          1 => 
          array (
            'name' => 'target_organization_c',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_ORGANIZATION',
            'displayParams' => 
            array (
              'call_back_function' => 'setHeaderOrganizationPopupReturn',
              ),
            ),
          ),
        3 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'tracking_number',
            'label' => 'LBL_TRACKING_NUMBER',
            ),
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'planned_execution_date',
            'label' => 'LBL_PLANNED_EXECUTION_DATE',
            ),
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
            'label' => 'LBL_LINE_ITEMS',
            ),
          ),
        ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'change_target_status',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_TARGET_STATUS',
            ),
          1 => 
          array (
            'name' => 'target_asset_status',
            'label' => 'LBL_TARGET_ASSET_STATUS',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'change_organization',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ORGANIZATION',
            ),
          1 => 
          array (
            'name' => 'change_oranization_le',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_ORANIZATION_LE',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'change_contact',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_CONTACT',
            ),
          1 => '',
          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'change_location',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_LOCATION',
            ),
          1 => 
          array (
            'name' => 'change_location_desc',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_LOCATION_DESC',
            ),
          ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'require_approval_workflow',
            'studio' => 'visible',
            'label' => 'LBL_REQUIRE_APPROVAL_WORKFLOW',
            ),
          1 => 
          array (
            'name' => 'require_confirmation',
            'studio' => 'visible',
            'label' => 'LBL_REQUIRE_CONFIRMATION',
            ),
          ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'change_processing_status',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_PROCESSING_STATUS',
            ),
          1 => 
          array (
            'name' => 'processing_asset_status',
            'studio' => 'visible',
            'label' => 'LBL_PROCESSING_ASSET_STATUS',
            ),
          ),
        6 =>
        array (
          0 =>
          array (
            'name' => 'lov_asset_status_list',
            'studio' => 'visible',
            'label' => 'lov_asset_status_list',
            ),
          1 =>
          array (
            'name' => 'lov_cux_event_type_option_list',
            'studio' => 'visible',
            'label' => 'lov_cux_event_type_option_list',
            ),
          ),
        ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 'description',
          ),
        ),
      ),
),
);
?>
