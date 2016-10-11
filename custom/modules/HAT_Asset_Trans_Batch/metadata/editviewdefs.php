<?php
$module_name = 'HAT_Asset_Trans_Batch';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="source_woop_id" id="source_woop_id" value="{$SOURCE_WOOP_ID}">',
          1 => '<input type="hidden" name="source_wo_id"  id="source_wo_id" value="{$SOURCE_WO_ID}">',
          2 => '<input type="hidden" name="source_wo_org"  id="source_wo_org" value="{$SOURCE_WO_ORG}">',
          11 => '<input type="hidden" name="require_approval_workflow" id="require_approval_workflow">',
          12 => '<input type="hidden" name="require_confirmation"  id="require_confirmation">',
          13 => '<input type="hidden" name="change_target_status"  id="change_target_status">',
          14 => '<input type="hidden" name="change_parent"  id="change_parent">',
          15 => '<input type="hidden" name="change_location"  id="change_location">',
          16 => '<input type="hidden" name="processing_asset_status"  id="processing_asset_status">',
          17 => '<input type="hidden" name="change_rack_position"  id="change_rack_position">',
          18 => '<input type="hidden" name="change_owning_org"  id="change_owning_org">',
          19 => '<input type="hidden" name="change_owning_person"  id="change_owning_person">',
          20 => '<input type="hidden" name="change_using_org"  id="change_using_org">',
          21 => '<input type="hidden" name="change_using_person"  id="change_using_person">',
          22 => '<input type="hidden" name="change_oranization_le"  id="change_oranization_le">',
          23 => '<input type="hidden" name="event_short_desc"  id="event_short_desc">',
          24 => '<input type="hidden" name="target_asset_status"  id="target_asset_status">',
        ),
      ),
      'includes' => 
      array (
        0 =>
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        1 =>
        array (
        'file' => 'modules/HIT_IP_TRANS_BATCH/js/html_dom_required_setting.js',
        ),
        2 =>
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
            'name' => 'framework',
            'customCode' => '{$FRAMEWORK}',
          ),
          1 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&basic_type_advanced=AT_MOVE',
              'field_to_name_array' => 
              array (
                'name' => 'event_type',
                'id' => 'hat_eventtype_id',
                'event_short_desc' => 'name',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setEventTypePopupReturn',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_trans_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_TRANS_STATUS',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'current_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_OWNING_ORG',
          ),
          1 => 'owner_contacts',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'target_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_OWNING_ORG',
          ),
          1 => 
          array (
            'name' => 'target_using_org',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_USING_ORG',
          ),
        ),
        4 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'tracking_number',
            'label' => 'LBL_TRACKING_NUMBER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'planned_execution_date',
            'label' => 'LBL_PLANNED_EXECUTION_DATE',
          ),
          1 => 
          array (
            'name' => 'planned_complete_date',
            'label' => 'LBL_PLANNED_COMPLETE_DATE',
          ),
        ),

        6 => 
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
        7 => 
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
        8 => 
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
        9 => 
        array (
          0 => 'description',
          1 => '',
        ),
        10 => 
        array (
          0 => 'wo_lines',
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
    ),
  ),
);
?>
