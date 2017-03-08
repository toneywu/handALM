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
          2 => '<input type="hidden" name="source_wo_org"  id="source_wo_org" value="{$SOURCE_WO_ORG}">',
          3 => '<input type="hidden" name="source_wo_account"  id="source_wo_account" value="{$SOURCE_WO_ACCOUNT}">',
          4 => '<input type="hidden" name="source_wo_account_id"  id="source_wo_account_id" value="{$SOURCE_WO_ACCOUNT_ID}">',
          5 => '<input type="hidden" name="source_wo_contact"  id="source_wo_contact" value="{$SOURCE_WO_CONTACT}">',
          6 => '<input type="hidden" name="source_wo_contact_id"  id="source_wo_contact_id" value="{$SOURCE_WO_CONTACT}">',
          11 => '<input type="hidden" name="eventOptions" id="eventOptions">',
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
              'initial_filter' => '&basic_type_advanced=AT_MOVE&tag_advanced={$EVENTTYPE_TAG}',
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
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_trans_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_TRANS_STATUS',
          ),
          1 => 'site',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'current_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_OWNING_ORG',
            'displayParams' => 
            array (
              'initial_filter' => '&asset_using_org=Y',
            ),
          ),
          1 => 'owner_contacts',
        ),
        2 => 
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
            'displayParams' => 
            array (
              'initial_filter' => '&asset_using_org=Y',
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
          1 => 
          array (
            'name' => 'planned_complete_date',
            'label' => 'LBL_PLANNED_COMPLETE_DATE',
          ),
        ),
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'source_wo',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WO',
          ),
          1 => 
          array (
            'name' => 'source_woop',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WOOP',
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
