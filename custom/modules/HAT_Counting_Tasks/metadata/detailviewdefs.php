<?php
$module_name = 'HAT_Counting_Tasks';
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
        'LBL_EDITVIEW_PANEL2' => 
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
            'name' => 'counting_batch_name',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_BATCH_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'task_number',
            'label' => 'LBL_TASK_NUMBER',
          ),
          1 => 'name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'counting_task_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_TASK_STATUS',
          ),
          1 => 
          array (
            'name' => 'objects_type',
            'studio' => 'visible',
            'label' => 'LBL_OBJECTS_TYPE',
          ),
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
            'studio' => 'visible',
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
          1 => 
          array (
            'name' => 'counting_person',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_PERSON',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'manual_add_flag',
            'label' => 'LBL_MANUAL_ADD_FLAG',
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
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'major',
            'studio' => 'visible',
            'label' => 'LBL_MAJOR',
          ),
          1 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'user_person',
            'studio' => 'visible',
            'label' => 'LBL_USER_PERSON',
          ),
          1 => 
          array (
            'name' => 'own_person',
            'studio' => 'visible',
            'label' => 'LBL_OWN_PERSON',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'total_counting',
            'studio' => 'visible',
            'label' => 'LBL_TOTAL_COUNTING',
          ),
          1 => 
          array (
            'name' => 'actual_counting',
            'studio' => 'visible',
            'label' => 'LBL_ACTUAL_COUNTING',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amt_actual_counting',
            'studio' => 'visible',
            'label' => 'LBL_AMT_ACTUAL_COUNTING',
          ),
          1 => 
          array (
            'name' => 'profit_counting',
            'studio' => 'visible',
            'label' => 'LBL_PROFIT_COUNTING',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'loss_counting',
            'studio' => 'visible',
            'label' => 'LBL_LOSS_COUNTING',
          ),
          1 => 
          array (
            'name' => 'diff_counting',
            'studio' => 'visible',
            'label' => 'LBL_DIFF_COUNTING',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'actual_adjust_count',
            'studio' => 'visible',
            'label' => 'LBL_ACTUAL_ADJUST_COUNT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
