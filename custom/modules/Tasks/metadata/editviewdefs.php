<?php
$viewdefs ['Tasks'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="isSaveAndNew" value="false">',
        ),
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
          2 => 
          array (
            'customCode' => '{if $fields.status.value != "Completed"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" class="button" onclick="document.getElementById(\'status\').value=\'Completed\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; if(check_form(\'EditView\'))SUGAR.ajaxUI.submitForm(this.form);" type="button" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_FF/ff_include.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/Tasks/js/TasksEditView.js',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_TASK_INFORMATION' => 
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
            'name' => 'haa_framework_c',
            'studio' => 'visible',
            'label' => 'LBL_HAA_FRAMEWORK',
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'task_type_c',
            'studio' => 'visible',
            'label' => 'LBL_TASK_TYPE',
            'displayParams' => 
            array (
              'initial_filter' => '&code_type_advanced=task_type',
              'field_to_name_array' => 
              array (
                'name' => 'task_type_c',
                'id' => 'haa_codes_id_c',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setTasksTypePopupReturn',
            ),
          ),
        ),
      ),
      'lbl_task_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
          1 => 
          array (
            'name' => 'date_start',
            'type' => 'datetimecombo',
            'displayParams' => 
            array (
              'showNoneCheckbox' => true,
              'showFormats' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
            'label' => 'LBL_LIST_RELATED_TO',
          ),
          1 => 
          array (
            'name' => 'date_due',
            'type' => 'datetimecombo',
            'displayParams' => 
            array (
              'showNoneCheckbox' => true,
              'showFormats' => true,
            ),
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'contact_name',
            'label' => 'LBL_CONTACT_NAME',
          ),
          1 => 
          array (
            'name' => 'priority',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'attribute1_c',
            'label' => 'LBL_ATTRIBUTE1',
          ),
          1 => 
          array (
            'name' => 'attribute2_c',
            'label' => 'LBL_ATTRIBUTE2',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'attribute3_c',
            'label' => 'LBL_ATTRIBUTE3',
          ),
          1 => 
          array (
            'name' => 'attribute4_c',
            'label' => 'LBL_ATTRIBUTE4',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'attribute5_c',
            'label' => 'LBL_ATTRIBUTE5',
          ),
          1 => 
          array (
            'name' => 'attribute6_c',
            'label' => 'LBL_ATTRIBUTE6',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'attribute7_c',
            'label' => 'LBL_ATTRIBUTE7',
          ),
          1 => 
          array (
            'name' => 'attribute8_c',
            'label' => 'LBL_ATTRIBUTE8',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'description',
          ),
        ),
      ),
    ),
  ),
);
?>
