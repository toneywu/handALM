<?php
$module_name = 'HAT_Counting_Batchs';
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
          ),
          1 => 
          array (
            'name' => 'batch_number',
            'label' => 'LBL_BATCH_NUMBER',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'objects_type',
            'studio' => 'visible',
            'label' => 'LBL_OBJECTS_TYPE',
          ),
          1 => 'date_entered',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'planed_start_date',
            'label' => 'LBL_PLANED_START_DATE',
          ),
          1 => 
          array (
            'name' => 'planed_complete_date',
            'label' => 'LBL_PLANED_COMPLETE_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'snapshot_date',
            'label' => 'LBL_SNAPSHOT_DATE',
          ),
          1 => 
          array (
            'name' => 'adjust_posted',
            'label' => 'LBL_ADJUST_POSTED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'counting_by_location',
            'label' => 'LBL_COUNTING_BY_LOCATION',
          ),
          1 => 
          array (
            'name' => 'counting_mode',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_MODE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'counting_scene',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_SCENE',
          ),
          1 => 'description',
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
            'name' => 'location_drilldown',
            'label' => 'LBL_LOCATION_DRILLDOWN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
          ),
          1 => 
          array (
            'name' => 'org_drilldown',
            'label' => 'LBL_ORG_DRILLDOWN',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'major',
            'studio' => 'visible',
            'label' => 'LBL_MAJOR',
          ),
          1 => 
          array (
            'name' => 'major_drilldown',
            'label' => 'LBL_MAJOR_DRILLDOWN',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'category_drilldown',
            'label' => 'LBL_CATEGORY_DRILLDOWN',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'counting_rule',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_RULE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
