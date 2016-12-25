<?php
$module_name = 'HAT_Counting_Tasks';
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
          'file' => 'modules/HAT_Counting_Tasks/js/HAT_Counting_Tasks_editview.js',
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
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'counting_batch_name',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_BATCH_NAME',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+$("#haa_framework").val()+"',
              'field_to_name_array' => 
              array (
                'name' => 'counting_batch_name',
                'id' => 'hat_counting_batchs_id_c',
                'objects_type' => 'objects_type',
                'planed_start_date' => 'planed_start_date',
                'planed_complete_date' => 'planed_complete_date',
                'snapshot_date' => 'snapshot_date',
                'batch_number' => 'task_number',
                'counting_by_location' => 'counting_by_location',
                'counting_mode' => 'counting_mode',
                'counting_scene' => 'counting_scene',
                'location' => 'location_attr',
                'oranization' => 'oranization_attr',
                'major' => 'major_attr',
                'category' => 'category_attr',
              ),
              'call_back_function' => 'setExtendValReturn',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'task_number',
            'label' => 'LBL_TASK_NUMBER',
            'customCode' => '{$fields.task_number.value}',
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
            'customCode' => '<input class="date_input" autocomplete="off" name="planed_start_date" id="planed_start_date" value="" title="" tabindex="0" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'planed_complete_date',
            'label' => 'LBL_PLANED_COMPLETE_DATE',
            'customCode' => '<input class="date_input" autocomplete="off" name="planed_complete_date" id="planed_complete_date" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'snapshot_date',
            'label' => 'LBL_SNAPSHOT_DATE',
            'customCode' => '<input class="date_input" autocomplete="off" name="snapshot_date" id="snapshot_date" value="" title="" tabindex="0" type="text" readonly>',
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
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+$("#haa_framework").val()+"&module_name=HAT_Counting_Tasks',
            ),
          ),
          1 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+$("#haa_framework").val()+"&module_name=HAT_Counting_Tasks',
            ),
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'major',
            'studio' => 'visible',
            'label' => 'LBL_MAJOR',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=asset_counting_major_type&frame_c_advanced="+$("#haa_framework").val()+"&module_name=HAT_Counting_Tasks',
            ),
          ),
          1 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
            'displayParams' => 
            array (
              'initial_filter' => '&module_name=HAT_Counting_Tasks',
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
            'name' => 'total_counting',
            'studio' => 'visible',
            'label' => 'LBL_TOTAL_COUNTING',
            'customCode' => '<input name="total_counting" id="total_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'actual_counting',
            'studio' => 'visible',
            'label' => 'LBL_ACTUAL_COUNTING',
            'customCode' => '<input name="actual_counting" id="actual_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amt_actual_counting',
            'studio' => 'visible',
            'label' => 'LBL_AMT_ACTUAL_COUNTING',
            'customCode' => '<input name="amt_actual_counting" id="amt_actual_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'profit_counting',
            'studio' => 'visible',
            'label' => 'LBL_PROFIT_COUNTING',
            'customCode' => '<input name="profit_counting" id="profit_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'loss_counting',
            'studio' => 'visible',
            'label' => 'LBL_LOSS_COUNTING',
            'customCode' => '<input name="loss_counting" id="loss_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'diff_counting',
            'studio' => 'visible',
            'label' => 'LBL_DIFF_COUNTING',
            'customCode' => '<input name="diff_counting" id="diff_counting" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'actual_adjust_count',
            'studio' => 'visible',
            'label' => 'LBL_ACTUAL_ADJUST_COUNT',
            'customCode' => '<input name="actual_adjust_count" id="actual_adjust_count" size="30" maxlength="255" value="" title="" tabindex="0" type="text" readonly>',
          ),
        ),
      ),
    ),
  ),
);
?>
