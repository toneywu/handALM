<?php
$module_name = 'HIT_IP_TRANS_BATCH';
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
          'file' => 'modules/HIT_IP_TRANS_BATCH/js/HIT_IP_TRANS_BATCH_editview.js',
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
            'name' => 'framework',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode'=>'{$FRAMEWORK}'
          ),
          1 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
            'displayParams' =>
            array (
              'initial_filter' => '&basic_type_advanced=NETWORK',
              'field_to_name_array' =>
              array (
                'name' => 'event_type',
                'id' => 'hat_eventtype_id',
                'event_short_desc'=>'name'
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
          1 => 
          array (
            'name' => 'current_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_OWNING_ORG',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'target_owning_org',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_OWNING_ORG',
          ),
          1 => 'name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'tracking_number',
            'label' => 'LBL_TRACKING_NUMBER',
          ),
          1 => 
          array (
            'name' => 'source_wo',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WO',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'source_woop',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WOOP',
          ),
          1 => 
          array (
            'name' => 'owner_contacts',
            'studio' => 'visible',
            'label' => 'LBL_OWNER',
          ),
        ),
        5 => 
        array (
          0 => 'description',
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
          1 => '',
        ),
      ),
    ),
  ),
);
?>
