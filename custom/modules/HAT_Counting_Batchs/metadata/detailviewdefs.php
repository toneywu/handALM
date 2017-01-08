<?php
$module_name = 'HAT_Counting_Batchs';
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
          'file' => 'modules/HAT_Counting_Batchs/js/HAT_Counting_Batchs_detailview.js',
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
          4 => 
          array (
            'customCode' => '<input type="submit" class="button" onClick="createTask();" value="{$MOD.LBL_CREATE_TASK}">',
               'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_CREATE_TASK}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'create_to_task_button',
                'title' => '{$MOD.LBL_CREATE_TASK}',
                'onclick' => 'createTask();',
                'name' => 'Create to Task',
                ),
              ),
            ),
          'TASK_TOAPP' =>
          array (
            'customCode' => '<input type="submit" class="button" onClick="taskToapp();" value="{$MOD.LBL_TASK_TOAPP}">',
               'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_TASK_TOAPP}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'task_to_app_button',
                'title' => '{$MOD.LBL_TASK_TOAPP}',
                'onclick' => 'taskToapp();',
                'name' => 'Task To App',
                ),
              ),
            ),
          'DATA_TOCOUNTING' =>
          array (
            'customCode' => '<input type="submit" class="button" onClick="datatocounting();" value="{$MOD.LBL_DATA_TOCOUNTING}">',
               'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$MOD.LBL_DATA_TOCOUNTING}',
              'htmlOptions' => 
              array (
                'class' => 'button',
                'id' => 'data_to_counting_button',
                'title' => '{$MOD.LBL_DATA_TOCOUNTING}',
                'onclick' => 'datatocounting();',
                'name' =>'Data To Counting',
                ),
              ),
            ),
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
    ),
  ),
);
?>
