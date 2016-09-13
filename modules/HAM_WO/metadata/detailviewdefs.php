<?php
$module_name = 'HAM_WO';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAM_WO/js/detailview_map_point.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAM_WO/js/HAM_WO_detailview.js',
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
        'LBL_EDITVIEW_PANEL_GIS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL_SCHEDULE' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => true,
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
            'name' => 'wo_number',
            'label' => 'LBL_WO_NUMBER',
          ),
          1 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ham_act_id_rule',
            'studio' => 'visible',
          ),
          1 => 'name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'wo_status',
            'studio' => 'visible',
            'label' => 'LBL_WO_STATUS',
          ),
          1 => 'event_type',
        ),
        3 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'work_order_access',
            'studio' => 'visible',
            'label' => 'LBL_WORK_ORDER_ACCESS',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'location_extra_desc',
            'label' => 'LBL_LOCATION_EXTRA_DESC',
          ),
          1 => 'map_enabled',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contract',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel_gis' => 
      array (
        0 => 
        array (
          0 => 'map_search_area',
        ),
        1 => 
        array (
          0 => 'map_type',
          1 => 'map_zoom',
        ),
        2 => 
        array (
          0 => 'map_lat',
          1 => 'map_lng',
        ),
        3 => 
        array (
          0 => 'map_display_area',
        ),
      ),
      'lbl_editview_panel_schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'wo_priority',
            'studio' => 'visible',
            'label' => 'LBL_WO_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'plan_fixed',
            'label' => 'LBL_PLAN_FIXED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_target_start',
            'label' => 'LBL_TARGET_START_DATE',
          ),
          1 => 
          array (
            'name' => 'date_target_finish',
            'label' => 'LBL_TARGET_FINISH_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_schedualed_start',
            'label' => 'LBL_SCHEDUALED_START_DATE',
          ),
          1 => 
          array (
            'name' => 'date_schedualed_finish',
            'label' => 'LBL_SCHEDUALED_FINISH_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_start_not_earlier',
            'label' => 'LBL_START_NOT_EARLIER_DATE',
          ),
          1 => 
          array (
            'name' => 'date_finish_not_later',
            'label' => 'LBL_FINISH_NOT_LATER_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_actual_start',
            'label' => 'LBL_ACTUAL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'date_actual_finish',
            'label' => 'LBL_ACTUAL_FINISH_DATE',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'reporter',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER',
          ),
          1 => 
          array (
            'name' => 'reporter_org',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER_ORG',
          ),
        ),
        1 => 
        array (
          0 => 'reported_date',
          1 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
        ),
        2 => 
        array (
          0 => 'source_type',
          1 => 'source_reference',
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 'wo_lines',
        ),
      ),
    ),
  ),
);
?>
