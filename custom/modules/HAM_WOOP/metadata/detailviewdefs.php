<?php
$module_name = 'HAM_WOOP';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAM_WOOP/js/HAM_WOOP_detailview.js',
        ),
      ),
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
            'name' => 'wo_number',
            'studio' => 'visible',
            'label' => 'LBL_WO_NUMBER',
          ),
          1 => 
          array (
            'name' => 'woop_number',
            'label' => 'LBL_WOOP_NUMBER',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'woop_status',
            'studio' => 'visible',
            'label' => 'LBL_WOOP_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'work_center',
            'studio' => 'visible',
            'label' => 'LBL_WORK_CENTER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'work_center_res',
            'studio' => 'visible',
            'label' => 'LBL_WORK_CENTER_RES',
          ),
          1 => 
          array (
            'name' => 'work_center_people',
            'studio' => 'visible',
            'label' => 'LBL_HAM_WORK_CENTER_PEOPLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contract',
            'studio' => 'visible',
            'label' => 'LBL_CONTRACT',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
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
            'name' => 'date_start_not_earlier',
            'label' => 'LBL_START_NOT_EARLIER_DATE',
          ),
          1 => 
          array (
            'name' => 'date_finish_not_later',
            'label' => 'LBL_FINISH_NOT_LATER_DATE',
          ),
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'duration_target',
            'label' => 'LBL_DURATION_TARGET',
          ),
          1 => 
          array (
            'name' => 'duration_schedualed',
            'label' => 'LBL_DURATION_SCHEDUALED',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'duration_actual',
            'label' => 'LBL_DURATION_ACTUAL',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'act_module',
            'studio' => 'visible',
            'label' => 'LBL_ACT_MODULE',
          ),
        ),
        1 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'next_woop',
            'studio' => 'visible',
            'label' => 'LBL_NEXT_WOOP',
          ),
          1 => 
          array (
            'name' => 'next_woop_name',
            'studio' => 'visible',
            'label' => 'LBL_NEXT_WOOP_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'next_work_center',
            'studio' => 'visible',
            'label' => 'LBL_NEXT_WORK_CENTER',
          ),
          1 => 
          array (
            'name' => 'next_work_center_res',
            'studio' => 'visible',
            'label' => 'LBL_NEXT_WORK_CENTER_RES',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'next_work_center_people',
            'studio' => 'visible',
            'label' => 'LBL_NEXT_WORK_CENTER_PEOPLE',
          ),
          1 => 
          array (
            'name' => 'autoopen_next_task',
            'label' => 'LBL_AUTOOPEN_NEXT_TASK',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'syn_wo_status',
            'label' => 'LBL_SYN_WO_STATUS',
          ),
        ),
      ),
    ),
  ),
);
?>
