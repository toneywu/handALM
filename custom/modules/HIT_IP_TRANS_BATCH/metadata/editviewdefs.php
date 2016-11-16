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
      'syncDetailEditViews' => true,
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
            'customCode' => '{$FRAMEWORK}',
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
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'target_owning_org',
                'id' => 'target_owning_org_id',
              ),
              'call_back_function' => 'setTargetOwningOrgPopupReturn',
            ),
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
            'name' => 'owner_contacts',
            'studio' => 'visible',
            'label' => 'LBL_OWNER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'source_wo',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WO',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'source_wo',
                'id' => 'source_wo_id',
				'hat_asset_locations_id'=>'location_id',
              ),
              'call_back_function' => 'setWoPopupReturn',
            ),
          ),
          1 => 
          array (
            'name' => 'source_woop',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_WOOP',
            'displayParams' => 
            array (
              'initial_filter' => '&ham_wo_id_advanced="+encodeURIComponent(document.getElementById("source_wo_id").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'source_woop',
                'id' => 'source_woop_id',
              ),
            ),
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_name',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
            'displayParams' => 
            array (
              'initial_filter' => '&account_id_advanced="+encodeURIComponent(document.getElementById("target_owning_org_id").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'contact_name',
                'id' => 'account_id',
                'email_and_name1' => 'email',
              ),
            ),
          ),
          1 => 
          array (
            'name' => 'email',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'service_date',
            'label' => 'LBL_SERVICE_DATE',
          ),
          1 => 
          array (
            'name' => 'send_to_customer',
            'label' => 'LBL_SEND_TO_CUSTOMER',
          ),
        ),
        7 => 
        array (
          0 => 'description',
        ),
		8=> 
        array (
          0 => 'wo_lines',
        ),
      ),
      'lbl_editview_panel2' => 
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
