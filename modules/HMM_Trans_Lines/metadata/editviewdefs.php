<?php
$module_name = 'HMM_Trans_Lines';
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
          'file' => 'modules/HMM_Trans_Lines/js/HMM_Trans_Lines_editview.js',
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
        'LBL_EDITVIEW_PANEL3' =>
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
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
            ),
          1 => 
          array (
            'name' => 'name',
            'customCode' => '<input type="hidden" name="name" id="name" size="30" maxlength="255" value="{$fields.name.value}">',
            ),
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
          0 => 'description',
          1 => '',
          ),
        ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'inventory_item',
            'studio' => 'visible',
            'label' => 'LBL_ITEM',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'inventory_item',
                'id' => 'item_id',
                'primary_uom_c' => 'primary_uom',
                'haa_uom_id_c' => 'primary_uom_id',
                'secondary_uom_c' => 'secondary_uom',
                'haa_uom_id1_c' => 'secondary_uom_id',
                'secondary_unit_defaulting_c' => 'secondary_unit_defaulting',
                'tracking_uom_c' => 'tracking_uom',
                ),
              'call_back_function' => 'setInventoryItemPopupReturn',
              ),
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'primary_qty',
            'label' => 'LBL_PRIMARY_QTY',
            ),
          1 => 
          array (
            'name' => 'primary_uom',
            'studio' => 'visible',
            'label' => 'LBL_PRIMARY_UOM',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'secondary_qty',
            'label' => 'LBL_SECONDARY_QTY',
            ),
          1 => 
          array (
            'name' => 'secondary_uom',
            'studio' => 'visible',
            'label' => 'LBL_SECONDARY_UOM',
            ),
          ),
        ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'from_location',
            'studio' => 'visible',
            'label' => 'LBL_FROM_LOCATION',
            'displayParams' => 
            array (
              'initial_filter' => '&basic_type_advanced=INV',
              'field_to_name_array' => 
              array (
                'name' => 'from_location',
                'id' => 'from_location_id',
                'inventory_mode' => 'from_locator_control',
                ),
              'call_back_function' => 'setfromLocatorPopupReturn',
              ),
            ),
          1 => 
          array (
            'name' => 'from_locator',
            'studio' => 'visible',
            'label' => 'LBL_FROM_LOCATOR',
            'displayParams' => 
            array (
              'initial_filter' => '&location_advanced="+encodeURIComponent(document.getElementById("from_location").value)+"',
              'field_to_name_array' => 
              array (
                'name' => 'from_locator',
                'id' => 'from_locator_id',
                ),
              ),
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'to_location',
            'studio' => 'visible',
            'label' => 'LBL_TO_LOCATION',
            'displayParams' =>
            array (
              'initial_filter' => '&basic_type_advanced=INV',
              'field_to_name_array' =>
              array (
                'name' => 'to_location',
                'id' => 'to_location_id',
                'inventory_mode' => 'to_locator_control',
                ),
              'call_back_function' => 'settoLocatorPopupReturn',
              ),
            ),
          1 =>
          array (
            'name' => 'to_locator',
            'studio' => 'visible',
            'label' => 'LBL_TO_LOCATOR',
            'displayParams' =>
            array (
              'initial_filter' => '&location_advanced="+encodeURIComponent(document.getElementById("to_location").value)+"',
              'field_to_name_array' =>
              array (
                'name' => 'to_locator',
                'id' => 'to_locator_id',
                ),
              ),
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ham_woop',
            'studio' => 'visible',
            'label' => 'LBL_WOOP',
            ),
          1 => '',
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
          1 => 'secondary_unit_defaulting',
          ),
        2 => 
        array (
          0 => 'from_locator_control',
          1 => 'to_locator_control',
          ),
        3 => 
        array (
          0 => 'locator_control_lov',
          1 => 'uom_conversion',
          ),
        4 => 
        array (
          0 => 'tracking_uom_lov',
          1 => 'tracking_uom',
          ),
        ),
      ),
),
);
?>
